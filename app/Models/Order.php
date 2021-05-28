<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    protected $fillable = [
    	'id','customer_id','first_name','last_name','service_type','service_id','table_count','address','email','phone','created_at','updated_at','status'
    ];
    public $incrementing = false;
    public function customer()
    {
        return $this->hasOne(Customer::class,'id','customer_id');
    }

    public function service()
    {
        return $this->hasOne(Service::class,'id','service_id');
    }

    public function details()
    {
    	return $this->hasMany(OrderDetail::class,'order_id','id');
    }
}
