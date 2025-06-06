<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\JsonResponder;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    use JsonResponder;
    public function index(Request $request)
    {
        if ($request->ajax() && $request->mode == 'select') {
            $data = User::with('produks')->get();
            return $this->successResponse(
                $data,
                'Data berhasil ditemukan',
            );
        } else if ($request->ajax()) {
            $perPages = 25;
            $query    = User::query();

            if ($request->has('search') && $request->search != '') {
                $query->where('nama', 'like', '%' . $request->search . '%')->orWhere('deskripsi', 'like', '%' . $request->search . '%');
            }

            if ($request->filled('perPage') && $request->perPage != '') {
                $perPages = $request->perPage;
            }

            $users = $query->orderBy('created_at')->paginate($perPages);

            $data = [
                'view'       => view('pages.admin.pengguna.components.table', compact('users'))->render(),
                'pagination' => (string) $users->links('vendor.pagination.tailwind'),
            ];

            return $this->successResponse($data, 'Data berhasil ditemukan.');
        }
        return view('pages.admin.pengguna.index');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'nama'     => 'required',
            'email'    => 'required|email',
            'password' => 'required',
            'role'     => 'required',
        ]);

        try {
            $user = User::create($validator);
            return $this->successResponse(
                $user,
                'Data berhasil disimpan.'
            );
        } catch (\Exception $e) {
            return $this->errorResponse(null, 'Data Pengguna gagal disimpan. ' . $e->getMessage());
        }
    }

    public function show(string $id)
    {
        $user = User::where('id', $id)->first();
        if (! $user) {
            return $this->errorResponse(null, 'Data gagal ditemukan');
        }
        return $this->successResponse($user, 'Data berhasil ditemukan');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::where('id', $id)->first();

        if (! $user) {
            return $this->errorResponse(null, 'Data Pengguna tidak ditemukan.');
        }

        $validated = $request->validate([
            'nama'  => 'required',
            'email' => 'required|email',
            'role'  => 'required',
        ]);

        try {

            $user->update($validated);

            return $this->successResponse(
                $user,
                'Pengguna berhasil diupdate.'
            );
        } catch (\Exception $e) {
            return $this->errorResponse(null, 'Gagal update data Pengguna. ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::where('id', $id)->first();

        if (! $user) {
            return $this->errorResponse(null, 'Data Pengguna tidak ditemukan. ' . $id);
        }
        try {
            $user->delete();
            return $this->successResponse(
                $user,
                'Pengguna berhasil dihapus.'
            );
        } catch (\Exception $e) {
            return $this->errorResponse(null, 'Pengguna gagal dihapus. ' . $e->getMessage());
        }
    }
}
