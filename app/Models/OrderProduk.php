<?php
namespace App\Models;

use App\Models\Order;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Model;

class OrderProduk extends Model
{
    protected $guarded = ['id'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
