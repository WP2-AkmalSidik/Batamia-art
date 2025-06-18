<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Keranjang;
use App\Models\KeranjangProduk;
use App\Traits\JsonResponder;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    use JsonResponder;
    public function index()
    {
        $keranjangs = Keranjang::with('user', 'keranjangProduks.produk')->where('user_id', auth()->user()->id)->first();
        return view('pages.user.keranjang', compact('keranjangs'));
    }

    public function detail()
    {
        return view('pages.user.keranjang.detail');
    }

    public function checkout()
    {
        return view('pages.user.keranjang.checkout');
    }

    public function store()
    {
        $validated = request()->validate([
            'produk_id'    => 'required',
            'keranjang_id' => 'required',
            'kuantitas'    => 'required',
        ]);

        try {
            $validated['cart_id'] = Keranjang::where('user_id', auth()->user()->id)->first()->id;

            KeranjangProduk::create($validated);

            return $this->successResponse(null, 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return $this->errorResponse(null, 'Data gagal disimpan. ' . $e->getMessage());
        }
    }
    public function updateKuantitas(Request $request, string $id)
    {
        $validated = $request->validate([
            'kuantitas' => 'required',
        ]);
        try {
            KeranjangProduk::where('id', $id)->update($validated);
            return $this->successResponse(null, 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return $this->errorResponse(null, 'Data gagal disimpan. ' . $e->getMessage());
        }
    }
}
