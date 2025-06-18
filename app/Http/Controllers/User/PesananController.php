<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
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

            $status = 'Dibayar';

            $order->status           = $status;
            $order->bukti_pembayaran = $pembayaran;
            $order->save();
        } catch (\Throwable $th) {
            return $this->errorResponse(null, 'Gagal update status. ' . $th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
