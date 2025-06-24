<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alamat;
use App\Models\User;
use App\Traits\JsonResponder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function profile()
    {
        $user = User::with('alamat')->where('id', auth()->user()->id)->first();
        return view('pages.user.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $rules = [
            'nama'  => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(),
        ];

        if (auth()->user()->role == 'user') {
            $rules = array_merge($rules, [
                'provinsi'       => 'required|string',
                'nomor_hp'       => 'required|string',
                'kota'           => 'required|string',
                'kecamatan'      => 'required|string',
                'kelurahan'      => 'required|string',
                'kode_pos'       => 'required|string',
                'alamat_lengkap' => 'required|string',
            ]);
        }

        $validated = $request->validate($rules);

        try {
            $user = User::findOrFail(auth()->id());
            $user->update([
                'nama'  => $validated['nama'],
                'email' => $validated['email'],
            ]);

            if (auth()->user()->role == 'user') {
                Alamat::updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        'provinsi'       => $validated['provinsi'],
                        'nomor_hp'       => $validated['nomor_hp'],
                        'kota'           => $validated['kota'],
                        'kecamatan'      => $validated['kecamatan'],
                        'kelurahan'      => $validated['kelurahan'],
                        'kode_pos'       => $validated['kode_pos'],
                        'alamat_lengkap' => $validated['alamat_lengkap'],
                    ]
                );
            }

            return $this->successResponse($user, 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return $this->errorResponse(null, 'Data gagal disimpan. ' . $e->getMessage());
        }
    }

    public function updatePassword(Request $request)
    {
        $validator = $request->validate([
            'password_lama'       => 'required',
            'password_baru'       => 'required',
            'password_konfirmasi' => 'required|same:password_baru',
        ]);

        try {
            $user = User::where('id', auth()->user()->id)->first();

            if (! Hash::check($validator['password_lama'], $user->password)) {
                return $this->errorResponse(null, 'Password lama salah.');
            }

            $user->update([
                'password' => Hash::make($validator['password_baru']),
            ]);
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
