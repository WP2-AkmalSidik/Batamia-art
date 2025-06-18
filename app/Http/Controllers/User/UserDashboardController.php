<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Produk;
use App\Traits\JsonResponder;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    use JsonResponder;
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $perPage = 25;
            $page    = $request->input('page', 1);

            $query = Produk::with('kategori', 'reviews');

            // Filter pencarian
            if ($request->has('search') && $request->search != '') {
                $query->where(function ($q) use ($request) {
                    $q->where('nama', 'like', '%' . $request->search . '%')
                        ->orWhere('deskripsi', 'like', '%' . $request->search . '%');
                });
            }

            // Filter kategori
            if ($request->has('kategori') && $request->kategori != '') {
                $query->where('kategori_id', $request->kategori);
            }

            // Filter harga
            if ($request->has('harga') && $request->harga != '') {
                $hargaRange = explode('-', $request->harga);
                if (count($hargaRange) == 2) {
                    $query->whereBetween('harga', [$hargaRange[0], $hargaRange[1]]);
                }
            }

            // Pengurutan
            switch ($request->urutkan) {
                case 'terbaru':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'termurah':
                    $query->orderBy('harga', 'asc');
                    break;
                case 'termahal':
                    $query->orderBy('harga', 'desc');
                    break;
                case 'populer':
                    $query->withCount([
                        'orderProduks as total_terjual' => function ($q) {
                            $q->whereHas('order', function ($q) {
                                $q->where('status', 'selesai'); // Sesuaikan dengan status order selesai
                            });
                        },
                    ])->orderBy('total_terjual', 'desc');
                    break;
                default:
                    $query->orderBy('created_at', 'desc');
            }

            // Pagination dengan load more
            $produks = $query->skip(($page - 1) * $perPage)
                ->take($perPage + 1)
                ->get();

            $hasMore = $produks->count() > $perPage;

            if ($hasMore) {
                $produks = $produks->slice(0, $perPage);
            }

            // Hitung rating rata-rata untuk setiap produk
            $produks->each(function ($produk) {
                $produk->average_rating = $produk->reviews->avg('rating') ?? 0;
            });

            $data = [
                'view'      => view('pages.user.produk', compact('produks'))->render(),
                'has_more'  => $hasMore,
                'next_page' => $page + 1,
            ];

            return $this->successResponse($data, 'Data berhasil ditemukan.');
        }

        return view('pages.user.dashboard');
    }
    public function show(string $id)
    {
        $produk  = Produk::with('kategori', 'reviews')->where('id', $id)->first();
        $terjual = Order::whereHas('orderProduks', function ($query) use ($produk) {
            $query->where('produk_id', $produk->id);
        })->where('status', 'selesai')->count();
        return view('pages.user.detail-produk', compact('produk', 'terjual'));
    }
}
