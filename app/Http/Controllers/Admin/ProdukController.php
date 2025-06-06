<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Traits\JsonResponder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    use JsonResponder;
    public function index(Request $request)
    {
        if ($request->ajax() && $request->mode == 'select') {
            $data = Produk::with('kategori')->get();
            return $this->successResponse(
                $data,
                'Data berhasil ditemukan',
            );
        } else if ($request->ajax()) {
            $perPages = 25;
            $query    = Produk::with('kategori');

            if ($request->has('search') && $request->search != '') {
                $query->where('nama', 'like', '%' . $request->search . '%')->orWhere('deskripsi', 'like', '%' . $request->search . '%');
            }

            if ($request->filled('perPage') && $request->perPage != '') {
                $perPages = $request->perPage;
            }

            $produks = $query->orderBy('created_at')->paginate($perPages);

            $data = [
                'view'       => view('pages.admin.produk.components.table', compact('produks'))->render(),
                'pagination' => (string) $produks->links('vendor.pagination.tailwind'),
            ];

            return $this->successResponse($data, 'Data berhasil ditemukan.');
        }
        return view('pages.admin.produk.index');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'nama'        => 'required',
            'deskripsi'   => 'nullable',
            'harga'       => 'required|numeric|min:1000',
            'stok'        => 'required|integer',
            'berat'       => 'required|integer',
            'image'       => 'nullable|image|max:2048',
        ]);

        try {
            if ($request->hasFile('image')) {
                $fotoPath           = $request->file('image')->store('produk', 'public');
                $validated['image'] = $fotoPath;
            } else {
                $validated['image'] = getUiAvatar($validated['nama']);
            }

            $produk = Produk::create($validated);

            return $this->successResponse($produk, 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            \Log::error('Gagal menyimpan produk: ' . $e->getMessage());
            return $this->errorResponse(null, 'Data gagal disimpan. ' . $e->getMessage());
        }
    }
    public function show(string $id)
    {
        $produk = Produk::with('kategori')->where('id', $id)->first();
        if (! $produk) {
            return $this->errorResponse(null, 'Data gagal ditemukan');
        }
        return $this->successResponse($produk, 'Data berhasil ditemukan');
    }
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'nama'        => 'required|unique:produks,nama,' . $id,
            'deskripsi'   => 'nullable',
            'status'      => 'required|boolean',
            'harga'       => 'required|numeric|min:1000',
            'stok'        => 'required|integer|min:0',
            'berat'       => 'required|integer|min:1',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try {
            $produk = Produk::findOrFail($id);

            // Handle image update
            if ($request->hasFile('image')) {
                // Hapus gambar lama jika ada
                if ($produk->image && Storage::disk('public')->exists($produk->image)) {
                    Storage::disk('public')->delete($produk->image);
                }

                // Simpan gambar baru
                $fotoPath           = $request->file('image')->store('produk', 'public');
                $validated['image'] = $fotoPath;
            } else {
                // Pertahankan gambar lama jika tidak ada upload baru
                unset($validated['image']);
            }

            $produk->update($validated);

            return $this->successResponse($produk, 'Data produk berhasil diperbarui.');
        } catch (\Exception $e) {
            \Log::error('Gagal memperbarui produk: ' . $e->getMessage());
            return $this->errorResponse(null, 'Data gagal diperbarui. Silakan coba lagi.');
        }
    }

    public function destroy(string $id)
    {
        $produk = Produk::where('id', $id)->first();

        if (! $produk) {
            return $this->errorResponse(null, 'Produk tidak ditemukan. ' . $id);
        }
        try {
            $produk->delete();
            return $this->successResponse(
                $produk,
                'Produk berhasil dihapus.'
            );
        } catch (\Exception $e) {
            return $this->errorResponse(null, 'Produk gagal dihapus. ' . $e->getMessage());
        }
    }

}
