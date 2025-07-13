<?php
namespace App\Models;

use App\Models\Produk;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
    public static function kepuasanToko()
    {
        return static::avg('rating');
    }

}
