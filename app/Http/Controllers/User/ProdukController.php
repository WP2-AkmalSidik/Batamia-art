<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Traits\JsonResponder;

class ProdukController extends Controller
{
    use JsonResponder;

    public function show(string $id)
    {
        return view('pages.user.detail-produk');
    }
}
