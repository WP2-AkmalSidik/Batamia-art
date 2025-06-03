<?php
namespace App\Models;

use App\Models\Bank;
use App\Models\User;
use App\Models\Alamat;
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
}
