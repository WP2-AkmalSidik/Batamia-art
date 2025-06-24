<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Keranjang;
use App\Models\KeranjangProduk;
use App\Models\Order;
use App\Models\OrderProduk;
use App\Models\Produk;
use App\Traits\JsonResponder;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    use JsonResponder;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $perPage = 25;
            $page    = $request->input('page', 1);

            $query = Order::with('user', 'alamat', 'bank', 'orderProduks.produk')->where('user_id', auth()->user()->id);

            // Filter kategori
            if ($request->has('status') && $request->kategori != '') {
                $query->where('status', $request->kategori);
            }

            // Pagination dengan load more
            $pesanans = $query->skip(($page - 1) * $perPage)
                ->take($perPage + 1)
                ->get();

            $hasMore = $pesanans->count() > $perPage;

            if ($hasMore) {
                $pesanans = $pesanans->slice(0, $perPage);
            }

            $data = [
                'view'      => view('pages.user.pesanan.card', compact('pesanans'))->render(),
                'has_more'  => $hasMore,
                'next_page' => $page + 1,
            ];

            return $this->successResponse($data, 'Data berhasil ditemukan.');
        }

        return view('pages.user.pesanan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function updatePembayaran(Request $request)
    {
        $request->validate([
            'order_id'         => 'required',
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $order = Order::where('id', $request->order_id)->first();

            if ($request->hasFile('bukti_pembayaran')) {
                $fotoPath   = $request->file('bukti_pembayaran')->store('pesanan', 'public');
                $pembayaran = $fotoPath;
            }

            $status = 'dibayar';

            $order->status           = $status;
            $order->bukti_pembayaran = $pembayaran;
            $order->save();

            return $this->successResponse(null, 'Pesanan berhasil dibayar.');
        } catch (\Exception $th) {
            return $this->errorResponse(null, 'Gagal membayar pesanan. ' . $th->getMessage());
        }
    }
    public function cancelPesanan(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
            'ket'      => 'required',
        ]);

        try {
            $order  = Order::where('id', $request->order_id)->first();
            $status = 'dibatalkan';

            $order->status = $status;
            $order->ket    = $request->ket;
            $order->save();

            return $this->successResponse(null, 'Pesanan dibatalkan.');
        } catch (\Exception $th) {
            return $this->errorResponse(null, 'Gagal membatalkan pesanan. ' . $th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id'                 => 'required|exists:users,id',
            'keranjang_id'            => 'required|exists:keranjangs,id',
            'total_harga'             => 'required|numeric|min:0',
            'bank_id'                 => 'nullable|exists:banks,id',
            'bukti_pembayaran'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kurir'                   => 'nullable|string|max:100',
            'etd'                     => 'nullable|string|max:100',
            'alamat_id'               => 'required|exists:alamats,id',
            'produk_id'               => 'required|array|min:1',
            'produk_id.*.id'          => 'required|exists:produks,id',
            'produk_id.*.quantity'    => 'required|numeric|min:1',
            'produk_id.*.total_harga' => 'required|numeric|min:0',
        ]);

        try {
            if ($request->hasFile('payment_proof')) {
                $validated['payment_proof'] = $request->file('payment_proof')->store('payment_proofs', 'public');
                $validated['status']        = 'dibayar';
            }
            $validated['status'] = 'belum_dibayar';

            $order = Order::create($validated);
            $cart  = Keranjang::where('user_id', $request->user_id)->first();

            foreach ($request->produk_id as $item) {
                OrderProduk::create([
                    'order_id'    => $order->id,
                    'produk_id'   => $item['id'],
                    'kuantitas'   => $item['quantity'],
                    'total_harga' => $item['total_harga'],
                ]);

                $product = Produk::find($item['id']);
                $product->decrement('stok', $item['quantity']);

                KeranjangProduk::where('keranjang_id', $cart->id)->where('produk_id', $item['id'])->delete();
            }

            return $this->successResponse(null, 'Berhasil memesan produk.');
        } catch (\Exception $e) {
            return $this->errorResponse(null, $e->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (! Order::find($id)) {
            return $this->errorResponse(null, 'Pesanan tidak ditemukan.');
        }
        $pesanan = Order::find($id);
        $pesanan->delete();

        return $this->successResponse(null, 'Pesanan berhasil dihapus.');
    }
}
