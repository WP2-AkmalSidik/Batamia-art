<?php
namespace App\Models;

use App\Models\Review;
use App\Models\Kategori;
use App\Models\OrderProduk;
use App\Models\KeranjangProduk;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $guarded = ['id'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function reviews()
    {
        return $this->belongsTo(Review::class);
    }
    public function keranjangProduks()
    {
        return $this->belongsTo(KeranjangProduk::class);
    }
    public function orderProduks()
    {
        return $this->belongsTo(OrderProduk::class);
    }
}
