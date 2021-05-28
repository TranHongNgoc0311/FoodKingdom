<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "category";
    protected $fillable = ['id','name','slug','deleted','created_at','updated_at'];

    public function product()
    {
    	return $this->hasMany(Product::class,'cat_id','id');
    }
}
