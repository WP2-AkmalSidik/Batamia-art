<?php
namespace App\Models;

use App\Models\User;
use App\Models\KeranjangProduk;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function keranjangProduks()
    {
        return $this->belongsTo(KeranjangProduk::class);
    }
}
