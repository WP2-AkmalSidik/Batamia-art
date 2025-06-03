<?php
namespace App\Models;

use App\Models\Produk;
use App\Models\Keranjang;
use Illuminate\Database\Eloquent\Model;

class KeranjangProduk extends Model
{
    protected $guarded = ['id'];

    public function keranjang()
    {
        return $this->belongsTo(Keranjang::class);
    }
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

}
