<?php
namespace App\Models;

use App\Models\Alamat;
use App\Models\Bank;
use App\Models\OrderProduk;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function alamat()
    {
        return $this->belongsTo(Alamat::class);
    }
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
    public function orderProduks()
    {
        return $this->hasMany(OrderProduk::class);
    }

    public static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            $model->invoice = "INV-" . date("ymd") . "-" . str_pad($model->id, 4, "0", STR_PAD_LEFT);
            $model->save(); // perlu disimpan ulang untuk update invoice
        });
    }
}
