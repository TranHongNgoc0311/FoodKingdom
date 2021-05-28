<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service_menu extends Model
{
    protected $table = "service_menu";
    protected $fillable = ['service_id','product_id','created_at','updated_at'];

    public function service()
    {
    	return $this->hasOne(Service::class,'id','service_id');
    }
    public function product()
    {
    	return $this->hasOne(Product::class,'id','product_id');
    }
}
