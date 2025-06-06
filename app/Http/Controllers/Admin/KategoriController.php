<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Traits\JsonResponder;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    use JsonResponder;
    public function index(Request $request)
    {
        if ($request->ajax() && $request->mode == 'select') {
            $data = Kategori::with('produks')->get();
            return $this->successResponse(
                $data,
                'Data berhasil ditemukan',
            );
        } else if ($request->ajax()) {
            $perPages = 25;
            $query    = Kategori::with('produks');

            if ($request->has('search') && $request->search != '') {
                $query->where('nama', 'like', '%' . $request->search . '%')->orWhere('deskripsi', 'like', '%' . $request->search . '%');
            }

            if ($request->filled('perPage') && $request->perPage != '') {
                $perPages = $request->perPage;
            }

            $kategoris = $query->orderBy('created_at')->paginate($perPages);

            $data = [
                'view'       => view('pages.admin.kategori.components.table', compact('kategoris'))->render(),
                'pagination' => (string) $kategoris->links('vendor.pagination.tailwind'),
            ];

            return $this->successResponse($data, 'Data berhasil ditemukan.');
        }
        return view('pages.admin.kategori.index');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'nama'      => 'required',
            'icon'      => 'required',
            'deskripsi' => 'nullable',
        ]);

        try {
            $kategori = Kategori::create($validator);
            return $this->successResponse(
                $kategori,
                'Data berhasil disimpan.'
            );
        } catch (\Exception $e) {
            return $this->errorResponse(null, 'Data Kategori gagal disimpan. ' . $e->getMessage());
        }
    }

    public function show(string $id)
    {
        $kategori = Kategori::with('produks')->where('id', $id)->first();
        if (! $kategori) {
            return $this->errorResponse(null, 'Data gagal ditemukan');
        }
        return $this->successResponse($kategori, 'Data berhasil ditemukan');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kategori = Kategori::where('id', $id)->first();

        if (! $kategori) {
            return $this->errorResponse(null, 'Data kategori tidak ditemukan.');
        }

        $validated = $request->validate([
            'nama'      => 'required',
            'icon'      => 'required',
            'deskripsi' => 'nullable',
        ]);

        try {

            $kategori->update($validated);

            return $this->successResponse(
                $kategori,
                'Kategori berhasil diupdate.'
            );
        } catch (\Exception $e) {
            return $this->errorResponse(null, 'Gagal update data kategori. ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::where('id', $id)->first();

        if (! $kategori) {
            return $this->errorResponse(null, 'Data Kategori tidak ditemukan. '.$id);
        }
        try {
            $kategori->delete();
            return $this->successResponse(
                $kategori,
                'Kategori berhasil dihapus.'
            );
        } catch (\Exception $e) {
            return $this->errorResponse(null, 'Kategori gagal dihapus. ' . $e->getMessage());
        }
    }
}
