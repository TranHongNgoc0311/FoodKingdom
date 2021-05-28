<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = "order_detail";
    protected $fillable = [
    	'order_id','product_id','created_at','updated_at'
    ];

    public function order()
    {
        return $this->hasOne(Order::class,'id','order_id');
    }

    public function menu()
    {
        return $this->hasOne(Product::class,'id','product_id');
    }
}
