<?php
namespace App\Models;

use App\Models\Kategori;
use App\Models\KeranjangProduk;
use App\Models\OrderProduk;
use App\Models\Review;
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
        return $this->hasMany(Review::class);
    }
    public function keranjangProduks()
    {
        return $this->hasMany(KeranjangProduk::class);
    }
    public function orderProduks()
    {
        return $this->hasMany(OrderProduk::class);
    }

    public function averageRating()
    {
        return $this->reviews()->avg('rating') ?? 0;
    }

    public function fullStars()
    {
        return floor($this->averageRating());
    }

    public function hasHalfStar()
    {
        return ($this->averageRating() - $this->fullStars()) >= 0.5;
    }
    public function terjual()
    {
        return $this->orderProduks()
            ->whereHas('order', function ($query) {
                $query->where('status', 'selesai');
            })
            ->sum('kuantitas'); // atau 'jumlah', tergantung nama kolom jumlah produk di OrderProduk
    }
}
