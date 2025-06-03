<?php
namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $guarded = ['id'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
