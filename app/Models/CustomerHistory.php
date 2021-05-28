<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerHistory extends Model
{
    protected $table = "customer_type_history";
    protected $fillable = ['customer_id','type_id','created_at','updated_at'];

    public function customer()
    {
    	return $this->hasOne(Customer::class,'id','customer_id');
    }
    public function type()
    {
    	return $this->hasOne(CustomerType::class,'id','type_id');
    }
}
