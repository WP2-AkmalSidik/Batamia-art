<?php
namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Keranjang;
use App\Models\User;
use App\Traits\JsonResponder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    use JsonResponder;
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return view('pages.auth');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function register()
    {
        return view('pages.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeLogin(Request $request)
    {
        $validator = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (! Auth::attempt($validator)) {
            return $this->errorResponse(null, 'Email atau password tidak valid.', 401);
        }

        $user = Auth::user();
        return $this->successResponse($user, 'Login berhasil.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function storeRegister(Request $request)
    {
        $validator = $request->validate([
            'nama'           => 'required',
            'email'          => 'required|email',
            'password'       => 'required',
            'nomor_hp'          => ['required', 'string', 'max:100'],
            'provinsi'       => ['required', 'string', 'max:100'],
            'kota'           => ['required', 'string', 'max:100'],
            'kecamatan'      => ['required', 'string', 'max:100'],
            'kelurahan'      => ['required', 'string', 'max:100'],
            'kode_pos'       => ['required', 'string', 'max:100'],
            'alamat_lengkap' => ['required', 'string'],
        ]);

        DB::beginTransaction();

        try {
            $user = User::create($validator);

            Keranjang::create([
                'user_id' => $user->id,
            ]);

            Alamat::create([
                'user_id'        => $user->id,
                'nama'           => $validator['nama'],
                'nomor_hp'          => $request->nomor_hp,
                'provinsi'       => $request->provinsi,
                'kota'           => $request->kota,
                'kecamatan'      => $request->kecamatan,
                'kelurahan'      => $request->kelurahan,
                'kode_pos'       => $request->kode_pos,
                'alamat_lengkap' => $request->alamat_lengkap,
            ]);

            DB::commit();

            return $this->successResponse($user, 'Berhasil Registrasi.');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->errorResponse(null, 'Registrasi gagal: ' . $e->getMessage());
        }

    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();
            return $this->successResponse(null, 'Logot berhasil');
        } catch (\Exception $e) {
            return $this->errorResponse(null, 'Logout gagal: ' . $e->getMessage());
        }

    }
}
