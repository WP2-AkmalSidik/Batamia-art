<?php
namespace App\Http\Controllers\Admin;

use App\Exports\LaporanPenjualanExport;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Traits\JsonResponder;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AdminDashboardController extends Controller
{
    use JsonResponder;
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $perPages = 10;
            $bulanIni = Carbon::now()->month;
            $tahunIni = Carbon::now()->year;

            $orderQuery = Order::with('orderProduks.produk', 'alamat.user', 'bank')
                ->whereMonth('created_at', $bulanIni)
                ->whereYear('created_at', $tahunIni);

            if ($request->has('status') && $request->status != '') {
                $orderQuery->where('status', $request->status);
            }

            $orders = $orderQuery->orderBy('created_at')->paginate($perPages);

            $globalQuery = Order::with('orderProduks.produk')
                ->whereMonth('created_at', $bulanIni)
                ->whereYear('created_at', $tahunIni);

            if ($request->has('status') && $request->status != '') {
                $globalQuery->where('status', $request->status);
            }

            $pemasukan = (clone $globalQuery)->where('status', 'selesai')->get();

            $totalProdukTerjual = $pemasukan
                ->flatMap(fn($order) => $order->orderProduks)
                ->sum('kuantitas');

            $totalPenjualan = (clone $globalQuery)->where('status', 'selesai')->count();

            $totalPemasukan = $pemasukan
                ->flatMap(fn($order) => $order->orderProduks)
                ->sum(fn($produk) => $produk->kuantitas * $produk->produk->harga);

            $totalProdukBatal      = (clone $globalQuery)->where('status', 'dibatalkan')->count();
            $totalProdukTolak      = (clone $globalQuery)->where('status', 'ditolak')->count();
            $totalProdukDibatalkan = $totalProdukBatal + $totalProdukTolak;
            $totalProdukDiproses   = (clone $globalQuery)->where('status', 'diproses')->count();
            $totalProdukDikirim    = (clone $globalQuery)->where('status', 'dikirim')->count();
            $totalProdukDibayar    = (clone $globalQuery)->where('status', 'dibayar')->count();

            $totalTransaksi       = (clone $globalQuery)->count();
            $totalKuantitasProduk = $orders->flatMap(fn($order) => $order->orderProduks)->sum('kuantitas');

            $averageProdukPerTransaksi = $totalPenjualan > 0
            ? round($totalProdukTerjual / $totalPenjualan, 2)
            : 0;

            $averagePemasukanPerTransaksi = $totalPenjualan > 0
            ? round($totalPemasukan / $totalPenjualan, 2)
            : 0;

            $data = [
                'view'       => view('pages.admin.dashboard.content',
                    compact(
                        'orders', 'totalPemasukan', 'totalPenjualan', 'totalProdukTerjual',
                        'averageProdukPerTransaksi', 'averagePemasukanPerTransaksi',
                        'totalProdukDibatalkan', 'totalProdukDiproses', 'totalProdukDikirim', 'totalProdukDibayar',
                        'totalTransaksi', 'totalKuantitasProduk', 'tahunIni', 'bulanIni'
                    ))->render(),
                'pagination' => (string) $orders->links('vendor.pagination.tailwind'),
            ];

            return $this->successResponse($data, 'Data berhasil ditemukan.');
        }

        return view('pages.admin.dashboard.index');
    }

    public function exportPdf(Request $request)
    {
        $orders   = $this->getFilteredOrders($request);
        $bulanIni = Carbon::now()->month;
        $tahunIni = Carbon::now()->year;
        $pdf      = Pdf::loadView('export.dashboard-laporan-penjualan-pdf', compact('orders', 'bulanIni', 'tahunIni'));

        return $pdf->download('laporan-penjualan.pdf');
    }

    public function exportExcel(Request $request)
    {
        return Excel::download(new LaporanPenjualanExport($request), 'laporan-penjualan.xlsx');
    }
    private function getFilteredOrders(Request $request)
    {
        $bulanIni = Carbon::now()->month;
        $tahunIni = Carbon::now()->year;
        $query    = Order::with('orderProduks.produk', 'alamat.user', 'bank')->whereMonth('created_at', $bulanIni)
            ->whereYear('created_at', $tahunIni);

        if ($request->status) {
            $query->where('status', $request->status);
        }

        return $query->get();
    }

}
