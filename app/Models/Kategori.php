<?php
namespace App\Models;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $guarded = ['id'];

    public function produks()
    {
        return $this->hasMany(Produk::class);
    }
}
