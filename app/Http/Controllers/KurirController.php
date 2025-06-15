<?php
namespace App\Http\Controllers;

use App\Services\KurirService;
use App\Traits\JsonResponder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KurirController extends Controller
{
    use JsonResponder;

    private KurirService $kurirService;

    public function __construct(KurirService $kurirService)
    {
        $this->kurirService = $kurirService;
    }

    /**
     * Ambil data destination
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getDestination(Request $request): JsonResponse
    {
        try {
            $search       = $request->get('search');
            $forceRefresh = $request->boolean('refresh', false);

            // Clear cache if force refresh is requested
            if ($forceRefresh) {
                $this->kurirService->clearCache('destination_id', ['search' => $search]);
            }

            $data = $this->kurirService->getDestinationId($search);

            return $this->successResponse($data, 'Data destination berhasil diambil', 200, [
                'total'     => count($data),
                'cached'    => ! $forceRefresh,
                'cache_key' => $this->kurirService->generateCacheKey('destination_id', ['search' => $search]),
            ]);

        } catch (\Exception $e) {
            Log::error('Error getting destination data', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return $this->errorResponse(null, 'Gagal mengambil data destination: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Ambil data ongkir
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getOngkir(Request $request): JsonResponse
    {
        try {
            $origin       = $request->get('origin');
            $destination  = $request->get('destination');
            $weight       = $request->get('weight');
            $courier      = $request->get('courier');
            $forceRefresh = $request->boolean('refresh', false);

            $params = [
                'origin'      => $origin,
                'destination' => $destination,
                'weight'      => $weight,
                'courier'     => $courier,
            ];

            // Clear cache if force refresh is requested
            if ($forceRefresh) {
                $this->kurirService->clearCache('ongkir', $params);
            }

            $data = $this->kurirService->getOngkir($origin, $destination, $weight, $courier);

            return $this->successResponse($data, 'Data ongkir berhasil diambil', 200, [
                'total'     => count($data),
                'cached'    => ! $forceRefresh,
                'cache_key' => $this->kurirService->generateCacheKey('ongkir', $params),
            ]);

        } catch (\Exception $e) {
            Log::error('Error getting ongkir data', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return $this->errorResponse(null, 'Gagal menghitung ongkir: ' . $e->getMessage(), 500);
        }
    }
}
