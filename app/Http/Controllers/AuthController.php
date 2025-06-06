<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\JsonResponder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'nama'     => 'required',
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::create($validator);
        return $this->successResponse($user, 'Berhasil Registrasi.');
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
