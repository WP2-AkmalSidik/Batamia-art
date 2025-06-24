<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Traits\JsonResponder;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    use JsonResponder;
    public function index(Request $request)
    {
        if ($request->ajax() && $request->mode == 'select') {
            $data = Order::with('orderProduks.produk', 'alamat', 'bank')->get();
            return $this->successResponse(
                $data,
                'Data berhasil ditemukan',
            );
        } else if ($request->ajax()) {
            $perPages = 25;
            $query    = Order::with('orderProduks.produk', 'alamat', 'bank');

            if ($request->has('search') && $request->search != '') {
                $query->where('nama', 'like', '%' . $request->search . '%');
            }

            if ($request->has('status') && $request->status != '') {
                $query->where('status', 'like', '%' . $request->status . '%');
            }

            if ($request->filled('perPage') && $request->perPage != '') {
                $perPages = $request->perPage;
            }

            $pesanans = $query->orderBy('created_at')->paginate($perPages);

            $data = [
                'view'       => view('pages.admin.pesanan.components.table', compact('pesanans'))->render(),
                'pagination' => (string) $pesanans->links('vendor.pagination.tailwind'),
            ];

            return $this->successResponse($data, 'Data berhasil ditemukan.');
        }
        return view('pages.admin.pesanan.index');
    }
    public function show(string $id)
    {
        $pesanan = Order::with('orderProduks.produk', 'alamat', 'bank', 'user')->where('id', $id)->first();
        if (! $pesanan) {
            return $this->errorResponse(null, 'Data gagal ditemukan');
        }
        return $this->successResponse($pesanan, 'Data berhasil ditemukan');
    }
    public function updateStatus(Request $request, string $id)
    {
        $pesanan = Order::where('id', $id)->first();
        if (! $pesanan) {
            return $this->errorResponse(null, 'Data tidak ditemukan');
        }
        $pesanan->status = $request->status;
        if ($request->status == 'dibayar') {
            $pesanan->bukti_pembayaran = $request->bukti_pembayaran;
        } elseif ($request->status == 'dikirim') {
            $pesanan->resi = $request->resi;
        } elseif ($request->status == 'ditolak') {
            $pesanan->ket = $request->ket;
        }

        $pesanan->save();
        return $this->successResponse($pesanan, 'Status berhasil di update.');
    }
    public function updateResi(Request $request)
    {
        $id      = $request->id;
        $pesanan = Order::where('id', $id)->first();
        if (! $pesanan) {
            return $this->errorResponse(null, 'Data tidak ditemukan');
        }
        $pesanan->resi = $request->resi;
        $pesanan->save();
        return $this->successResponse($pesanan, 'Resi berhasil di update.');
    }
}
