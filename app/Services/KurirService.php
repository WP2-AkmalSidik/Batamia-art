<?php
namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;

class KurirService
{
    private Client $client;
    private string $baseUrl;
    private string $apiKey;
    private int $cacheTimeout;

    public function __construct()
    {
        $this->client = new Client([
            'timeout'         => config('services.ongkir.timeout', 30),
            'connect_timeout' => config('services.ongkir.connect_timeout', 10),
            'verify'          => config('app.env') === 'production',
            'headers'         => [
                'User-Agent' => 'Laravel-WilayahService/1.0',
                'Accept'     => 'application/json',
            ],
        ]);

        $this->baseUrl      = config('services.ongkir.base_url', 'https://rajaongkir.komerce.id/api/v1');
        $this->apiKey       = config('services.ongkir.api_key');
        $this->cacheTimeout = config('services.ongkir.cache_timeout', 86400); // 24 jam

        if (empty($this->apiKey)) {
            throw new InvalidArgumentException('API key tidak ditemukan. Pastikan ONGKIR_API_KEY sudah diset di .env');
        }
    }

    /**
     * Ambil data destination ID
     *
     * @param string $search
     * @return array
     * @throws \Exception
     */
    public function getDestinationId(string $search): array
    {
        $cacheKey = $this->generateCacheKey('destination_id', ['search' => $search]);

        return Cache::remember($cacheKey, $this->cacheTimeout, function () use ($search) {
            return $this->makeRequest('destination/domestic-destination', ['search' => $search]);
        });
    }

    /**
     * Ambil data ongkir
     *
     * @param string|int $origin
     * @param string|int $destination
     * @param int $weight
     * @param string $courier
     * @return array
     * @throws \Exception
     */
    public function getOngkir($origin, $destination, $weight, $courier): array
    {
        $cacheKey = $this->generateCacheKey('ongkir', [
            'origin'      => $origin,
            'destination' => $destination,
            'weight'      => $weight,
            'courier'     => $courier,
        ]);

        return Cache::remember($cacheKey, $this->cacheTimeout, function () use ($origin, $destination, $weight, $courier) {
            return $this->makePostRequest('calculate/domestic-cost', [
                'weight'      => $weight,
                'courier'     => $courier,
                'destination' => $destination,
                'origin'      => $origin,
                'price'       => 'lowest',
            ]);
        });
    }

    /**
     * Cari wilayah berdasarkan nama
     *
     * @param string $query
     * @param string $type (provinsi|kabupaten|kecamatan|kelurahan)
     * @return array
     * @throws \Exception
     */
    public function searchWilayah(string $query, string $type = 'kabupaten'): array
    {
        $allowedTypes = ['provinsi', 'kabupaten', 'kecamatan', 'kelurahan'];

        if (! in_array($type, $allowedTypes)) {
            throw new InvalidArgumentException('Type harus salah satu dari: ' . implode(', ', $allowedTypes));
        }

        if (strlen(trim($query)) < 2) {
            throw new InvalidArgumentException('Query pencarian minimal 2 karakter');
        }

        $cacheKey = $this->generateCacheKey('wilayah_search', [
            'type'  => $type,
            'query' => $query,
        ]);

        return Cache::remember($cacheKey, 3600, function () use ($query, $type) { // Cache 1 jam untuk pencarian
            return $this->makeRequest($type, ['nama' => trim($query)]);
        });
    }

    /**
     * Generate consistent cache key
     *
     * @param string $prefix
     * @param array $params
     * @return string
     */
    public function generateCacheKey(string $prefix, array $params): string
    {
        // Sort parameters by key to ensure consistent ordering
        ksort($params);

        // Create a unique hash of the parameters
        $paramHash = md5(json_encode($params));

        return "kurir_service:{$prefix}:{$paramHash}";
    }

    /**
     * Clear cache untuk data tertentu
     *
     * @param string $prefix
     * @param array|null $params
     * @return bool
     */
    public function clearCache(string $prefix, ?array $params = null): bool
    {
        if ($params) {
            $cacheKey = $this->generateCacheKey($prefix, $params);
            return Cache::forget($cacheKey);
        }

        // Clear all cache with prefix (requires Redis or similar)
        // Note: This implementation may vary based on your cache driver
        $keys = Cache::getStore()->getPrefix() . "kurir_service:{$prefix}:*";
        if (method_exists(Cache::getStore(), 'deleteMultiple')) {
            $matchingKeys = Cache::getStore()->getRedis()->keys($keys);
            return Cache::getStore()->deleteMultiple($matchingKeys);
        }

        return false;
    }

    /**
     * Validasi ID parameter
     *
     * @param mixed $id
     * @param string $fieldName
     * @throws InvalidArgumentException
     */
    private function validateId($id, string $fieldName): void
    {
        if (empty($id) || (! is_string($id) && ! is_numeric($id))) {
            throw new InvalidArgumentException("{$fieldName} tidak boleh kosong dan harus berupa string atau angka");
        }

        if (is_string($id) && strlen(trim($id)) === 0) {
            throw new InvalidArgumentException("{$fieldName} tidak boleh kosong");
        }
    }

    /**
     * Membuat request ke API
     *
     * @param string $endpoint
     * @param array $params
     * @return array
     * @throws \Exception
     */
    private function makeRequest(string $endpoint, array $params = []): array
    {
        try {
            $url = $this->buildUrl($endpoint);

            Log::debug('WilayahService API Request', [
                'url'     => $url,
                'params'  => $params,
                'headers' => ['Authorization' => 'Bearer ***hidden***'], // log API key sebagai tersembunyi
            ]);

            $response = $this->client->get($url, [
                'query'   => $params,
                'headers' => [
                    'key' => $this->apiKey,
                ],
            ]);

            return $this->parseResponse($response);

        } catch (ConnectException $e) {
            Log::error('WilayahService Connection Error', [
                'endpoint' => $endpoint,
                'error'    => $e->getMessage(),
            ]);
            throw new \Exception("Tidak dapat terhubung ke server API wilayah. Silakan coba lagi nanti.");

        } catch (RequestException $e) {
            Log::error('WilayahService Request Error', [
                'endpoint'    => $endpoint,
                'status_code' => $e->getResponse()?->getStatusCode(),
                'error'       => $e->getMessage(),
            ]);

            if ($e->hasResponse()) {
                $response   = $e->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 401:
                        throw new \Exception("API key tidak valid atau expired: " . $url);
                    case 403:
                        throw new \Exception("Akses ditolak. Periksa API key dan quota");
                    case 404:
                        throw new \Exception("Endpoint tidak ditemukan: " . $url);
                    case 429:
                        throw new \Exception("Terlalu banyak request. Silakan coba lagi nanti");
                    case 500:
                        throw new \Exception("Server API mengalami gangguan");
                    default:
                        throw new \Exception("API Error: {$statusCode} - " . $response->getBody()->getContents());
                }
            }

            throw new \Exception("Request gagal: " . $e->getMessage());
        }
    }
    private function makePostRequest(string $endpoint, array $params = []): array
    {
        try {
            $url = $this->buildUrl($endpoint);

            Log::debug('WilayahService API Request', [
                'url'     => $url,
                'params'  => $params,
                'headers' => ['Authorization' => 'Bearer ***hidden***'], // log API key sebagai tersembunyi
            ]);

            $response = $this->client->post($url, [
                'query'   => $params,
                'headers' => [
                    'key' => $this->apiKey,
                ],
            ]);

            return $this->parseResponse($response);

        } catch (ConnectException $e) {
            Log::error('WilayahService Connection Error', [
                'endpoint' => $endpoint,
                'error'    => $e->getMessage(),
            ]);
            throw new \Exception("Tidak dapat terhubung ke server API wilayah. Silakan coba lagi nanti.");

        } catch (RequestException $e) {
            Log::error('WilayahService Request Error', [
                'endpoint'    => $endpoint,
                'status_code' => $e->getResponse()?->getStatusCode(),
                'error'       => $e->getMessage(),
            ]);

            if ($e->hasResponse()) {
                $response   = $e->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 401:
                        throw new \Exception("API key tidak valid atau expired: " . $url);
                    case 403:
                        throw new \Exception("Akses ditolak. Periksa API key dan quota");
                    case 404:
                        throw new \Exception("Endpoint tidak ditemukan: " . $url);
                    case 429:
                        throw new \Exception("Terlalu banyak request. Silakan coba lagi nanti");
                    case 500:
                        throw new \Exception("Server API mengalami gangguan");
                    default:
                        throw new \Exception("API Error: {$statusCode} - " . $response->getBody()->getContents());
                }
            }

            throw new \Exception("Request gagal: " . $e->getMessage());
        }
    }

    /**
     * Build URL untuk endpoint
     *
     * @param string $endpoint
     * @return string
     */
    private function buildUrl(string $endpoint): string
    {
        // Handle special case untuk kodepos yang menggunakan URL berbeda
        if ($endpoint === 'kodepos') {
            return 'https://api.binderbyte.com/kodepos';
        }

        return "{$this->baseUrl}/{$endpoint}";
    }

    /**
     * Parse response dari API
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     * @return array
     * @throws \Exception
     */
    private function parseResponse($response): array
    {
        $body = $response->getBody()->getContents();

        if (empty($body)) {
            throw new \Exception("Response dari API kosong");
        }

        $data = json_decode($body, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            Log::error('WilayahService JSON Parse Error', [
                'json_error'    => json_last_error_msg(),
                'response_body' => substr($body, 0, 500),
            ]);
            throw new \Exception("Response API tidak valid: " . json_last_error_msg());
        }

        if (! is_array($data)) {
            throw new \Exception("Format response API tidak sesuai");
        }

        // Cek apakah 'meta' tersedia
        if (! isset($data['meta']) || ! isset($data['meta']['code'])) {
            Log::warning('WilayahService: Response tanpa meta atau kode status', ['response' => $data]);
            throw new \Exception("Format response API tidak lengkap atau meta code tidak ditemukan");
        }

        $statusCode = (int) $data['meta']['code'];

        if ($statusCode !== 200) {
            $message = $data['meta']['message'] ?? 'Unknown error';
            Log::error('WilayahService API Error', [
                'code'          => $statusCode,
                'message'       => $message,
                'full_response' => $data,
            ]);
            throw new \Exception("API Error: {$message} (Code: {$statusCode})");
        }

        // Ambil isi dari 'data'
        $result = $data['data'] ?? [];

        if (! is_array($result)) {
            Log::warning('WilayahService: Data bukan array', ['data' => $result]);
            return [];
        }

        return $result;
    }

    /**
     * Get API status/health check
     *
     * @return array
     */
    public function getApiStatus(): array
    {
        try {
            $startTime = microtime(true);
            $this->makeRequest('provinsi', ['limit' => 1]);
            $responseTime = round((microtime(true) - $startTime) * 1000, 2);

            return [
                'status'           => 'healthy',
                'response_time_ms' => $responseTime,
                'timestamp'        => now()->toISOString(),
            ];
        } catch (\Exception $e) {
            return [
                'status'    => 'error',
                'error'     => $e->getMessage(),
                'timestamp' => now()->toISOString(),
            ];
        }
    }
}
