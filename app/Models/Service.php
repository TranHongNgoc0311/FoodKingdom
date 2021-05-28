<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = "service";
    protected $fillable = ['id','name','type','slug','price','sale','status','description','image','deleted','created_at','updated_at'];

    public function service_menu()
    {
    	return $this->hasMany(Service_menu::class,'service_id','id');
    }
}
