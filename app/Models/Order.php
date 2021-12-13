<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fileable = ['name', 'address'];

    public function orderdetail()
    {
        return $this->hasMany('App\Order_Detail');
    }
}
