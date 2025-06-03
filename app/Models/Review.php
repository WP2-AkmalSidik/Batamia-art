<?php
namespace App\Models;

use App\Models\User;
use App\Models\Produk;
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
}
