<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "menu";
    protected $fillable = ['id','name','slug','price','sale','cat_id','image','image_list','description','status','deleted','created_at','updated_at'];

    public function category()
    {
    	return $this->hasOne(Category::class,'id','cat_id');
    }
    public function service_menu()
    {
    	return $this->hasMany(Service_menu::class,'product_id','id');
    }
}
