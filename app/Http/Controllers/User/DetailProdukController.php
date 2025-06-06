<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetailProdukController extends Controller
{
    public function index()
    {
        return view('pages.user.detail-produk');
    }
}
