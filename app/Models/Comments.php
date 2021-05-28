<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = "comments";
    protected $fillable = ['id','customer_id','blog_id','status','parent_id','content','created_at','updated_at'];
    
    public function customer()
    {
    	return $this->hasOne(Customer::class,'id','customer_id');
    }

    public function blog()
    {
    	return $this->hasOne(Blog::class,'id','blog_id');
    }
}
