<?php

use App\Models\Alamat;
use App\Models\Bank;
use App\Models\Kategori;
use App\Models\Keranjang;
use App\Models\KeranjangProduk;
use App\Models\Pengaturan;
use App\Models\Produk;
use Illuminate\Support\Str;

if (! function_exists('getPengaturan')) {
    function getPengaturan(): ?Pengaturan
    {
        return Pengaturan::where('id', 1)->first();
    }
}

if (! function_exists('getTestimoni')) {
    function getTestimoni(): ?Pengaturan
    {
        return Pengaturan::where('id', 1)->first();
    }
}

if (! function_exists('formatNoHp')) {
    function formatNoHp($no)
    {
        // Hilangkan spasi, tanda strip, dan karakter aneh lainnya
        $no = preg_replace('/[^0-9]/', '', $no);

        if (Str::startsWith($no, '08')) {
            return '62' . substr($no, 1);
        }

        // Jika sudah 62 di depan, biarkan
        if (Str::startsWith($no, '62')) {
            return $no;
        }

        // Jika tanpa 0 atau 62 di depan (misal 812...), anggap tetap valid
        return '62' . ltrim($no, '0');
    }
}

if (! function_exists('randomColorHex')) {
    function randomColorHex(): string
    {
        return sprintf('%06X', mt_rand(0, 0xFFFFFF));
    }
}

if (! function_exists('getUiAvatar')) {
    function getUiAvatar($nama): string
    {
        $kata = explode(' ', trim($nama));

        if (count($kata) >= 2) {
            $namaUntukUrl = $kata[0] . '+' . $kata[1];
        } else {
            $namaUntukUrl = $kata[0] ?? '';
        }

        $url = 'https://ui-avatars.com/api/?background=' . randomColorHex() . '&color=fff&name=' . $namaUntukUrl;
        return $url;
    }
}

if (! function_exists('format_rp')) {
    /**
     * Format angka menjadi mata uang Rupiah (Rp)
     *
     * @param int|float $amount
     * @param int $decimal
     * @return string
     */
    function format_rp($amount, $decimal = 0)
    {
        return 'Rp. ' . number_format($amount, $decimal, ',', '.');
    }
}

if (! function_exists('format_berat')) {
    /**
     * Format berat (gram) ke "gram" atau "kg"
     *
     * @param int $beratDalamGram
     * @return string
     */
    function format_berat($beratDalamGram)
    {
        if ($beratDalamGram >= 1000) {
            $beratDalamKg = $beratDalamGram / 1000;
            // Jika hasil kg tanpa desimal (misal: 2000 gram -> 2 kg)
            return $beratDalamKg == (int) $beratDalamKg
            ? $beratDalamKg . ' kg'
            : number_format($beratDalamKg, 2) . ' kg'; // 2 angka desimal
        }
        return $beratDalamGram . ' gram';
    }
}

if (! function_exists('format_tanggal')) {
    /**
     * Format timestamp ke format tanggal Indonesia
     *
     * @param  string|\Carbon\Carbon $timestamp
     * @param  bool $withDayName
     * @return string
     */
    function format_tanggal($timestamp, $withDayName = false)
    {
        if (empty($timestamp)) {
            return '-';
        }

        $date = \Carbon\Carbon::parse($timestamp);

        if ($withDayName) {
            return $date->translatedFormat('l, j F Y'); // Contoh: Senin, 12 Mei 2023
        }

        return $date->translatedFormat('j F Y'); // Contoh: 12 Mei 2023
    }
}

if (! function_exists('cekReviews')) {
    function cekReviews($produkId, $orderId)
    {
        $produk = Produk::with('reviews')->where('id', $produkId)->first();
        return $produk->reviews()->where('order_id', $orderId)->first();
    }
}

if (! function_exists('sepuluhTahunTerakhir')) {
    function sepuluhTahunTerakhir()
    {
        $tahunTerakhir = date('Y');
        $tahun         = [];
        for ($i = 0; $i < 10; $i++) {
            $tahun[] = $tahunTerakhir - $i;
        }
        return $tahun;
    }
}

if (! function_exists('bulan')) {
    function bulan()
    {
        $bulan  = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $bulans = [];
        for ($i = 0; $i < 12; $i++) {
            $bulans[] = $bulan[$i];
        }
        return $bulans;
    }
}

if (! function_exists('getNamaBulan')) {

    function getNamaBulan($bulan)
    {
        $namaBulan = [
            1  => 'Januari',
            2  => 'Februari',
            3  => 'Maret',
            4  => 'April',
            5  => 'Mei',
            6  => 'Juni',
            7  => 'Juli',
            8  => 'Agustus',
            9  => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

        return $namaBulan[(int) $bulan] ?? 'Bulan Tidak Dikenal';
    }
}

if (! function_exists('percentage')) {
    function percentage($value, $decimals = 0)
    {
        return number_format($value * 100, $decimals);
    }
}

/**
 * Memisahkan underscore dan mengubah ke Judul Case (contoh: "Belum Dibayar")
 */
function toTitleCase(string $text): string
{
    return Str::title(str_replace('_', ' ', $text));
}

/**
 * Memisahkan underscore dan mengubah ke Sentence Case (contoh: "Belum dibayar")
 */
function toSentenceCase(string $text): string
{
    return ucfirst(str_replace('_', ' ', $text));
}

/**
 * Memisahkan underscore tanpa mengubah kapitalisasi (contoh: "belum dibayar")
 */
function replaceUnderscore(string $text): string
{
    return str_replace('_', ' ', $text);
}

if (! function_exists('isLogin')) {
    function isLogin()
    {
        return auth()->check();
    }
}

if (! function_exists('getKeranjangId')) {
    function getKeranjangId()
    {
        if (auth()->check()) {
            return Keranjang::where('user_id', auth()->user()->id)->first()->id;
        }
        return;
    }

}
if (! function_exists('getKeranjangProdukCount')) {
    function getKeranjangProdukCount()
    {
        if (auth()->check()) {
            return KeranjangProduk::where('keranjang_id', getKeranjangId())->count();
        }
        return;
    }
}

if (! function_exists('getKategori')) {
    function getKategori()
    {
        return Kategori::all();
    }
}

if (! function_exists('getBanks')) {
    function getBanks()
    {return Bank::all();}
}

if (! function_exists('getAlamat')) {
    function getAlamat()
    {
        return Alamat::where('user_id', auth()->user()->id)->first();
    }
}
