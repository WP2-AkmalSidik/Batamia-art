<?php
namespace App\Http\Controllers\Admin;

use App\Exports\LaporanPenjualanExport;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Traits\JsonResponder;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LaporanPenjualanController extends Controller
{
    use JsonResponder;
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $perPages   = 10;
            $orderQuery = Order::with('orderProduks.produk', 'alamat.user', 'bank');

            if ($request->has('filter') && $request->filter != '') {
                if ($request->filter == 'monthly' && $request->bulan != '' && $request->tahun != '') {
                    $orderQuery->whereMonth('created_at', $request->bulan)
                        ->whereYear('created_at', $request->tahun);
                } elseif ($request->filter == 'yearly' && $request->tahun != '') {
                    $orderQuery->whereYear('created_at', $request->tahun);
                } elseif ($request->filter == 'weekly' && $request->dariTanggal != '' && $request->sampaiTanggal != '') {
                    $orderQuery->whereBetween('created_at', [$request->dariTanggal, $request->sampaiTanggal]);
                }
            }

            if ($request->has('status') && $request->status != '') {
                $orderQuery->where('status', $request->status);
            }

            $orders = $orderQuery->orderBy('created_at')->paginate($perPages);

            $globalQuery = Order::with('orderProduks.produk');

            if ($request->has('filter') && $request->filter != '') {
                if ($request->filter == 'monthly' && $request->bulan != '' && $request->tahun != '') {
                    $globalQuery->whereMonth('created_at', $request->bulan)
                        ->whereYear('created_at', $request->tahun);
                } elseif ($request->filter == 'yearly' && $request->tahun != '') {
                    $globalQuery->whereYear('created_at', $request->tahun);
                } elseif ($request->filter == 'weekly' && $request->dariTanggal != '' && $request->sampaiTanggal != '') {
                    $globalQuery->whereBetween('created_at', [$request->dariTanggal, $request->sampaiTanggal]);
                }
            }

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
                'view'       => view('pages.admin.laporan-penjualan.content',
                    compact(
                        'orders', 'totalPemasukan', 'totalPenjualan', 'totalProdukTerjual',
                        'averageProdukPerTransaksi', 'averagePemasukanPerTransaksi',
                        'totalProdukDibatalkan', 'totalProdukDiproses', 'totalProdukDikirim', 'totalProdukDibayar',
                        'totalTransaksi', 'totalKuantitasProduk'
                    ))->render(),
                'pagination' => (string) $orders->links('vendor.pagination.tailwind'),
            ];

            return $this->successResponse($data, 'Data berhasil ditemukan.');

        }
        return view('pages.admin.laporan-penjualan.index');
    }
    public function exportPdf(Request $request)
    {
        $orders = $this->getFilteredOrders($request);
        $filter = [
            'filter'        => $request->filter,
            'bulan'         => $request->bulan,
            'tahun'         => $request->tahun,
            'dariTanggal'   => $request->dariTanggal,
            'sampaiTanggal' => $request->sampaiTanggal,
        ];
        $pdf = Pdf::loadView('export.laporan-penjualan-pdf', compact('orders', 'filter'));

        return $pdf->download('laporan-penjualan.pdf');
    }

    public function exportExcel(Request $request)
    {
        return Excel::download(new LaporanPenjualanExport($request), 'laporan-penjualan.xlsx');
    }
    private function getFilteredOrders(Request $request)
    {
        $query = Order::with('orderProduks.produk', 'alamat.user', 'bank');

        if ($request->filter == 'monthly' && $request->bulan && $request->tahun) {
            $query->whereMonth('created_at', $request->bulan)
                ->whereYear('created_at', $request->tahun);
        } elseif ($request->filter == 'yearly' && $request->tahun) {
            $query->whereYear('created_at', $request->tahun);
        } elseif ($request->filter == 'weekly' && $request->dariTanggal && $request->sampaiTanggal) {
            $query->whereBetween('created_at', [$request->dariTanggal, $request->sampaiTanggal]);
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        return $query->get();
    }

}
