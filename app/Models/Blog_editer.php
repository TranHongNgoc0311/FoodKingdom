<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Blog_editer extends Model
{
    protected $table = "blog_editer";
    protected $fillable = ['blog_id','editer','created_at','updated_at'];

    public function blog()
    {
    	return $this->hasOne(Blog::class,'id','blog_id');
    }
    
    public function user()
    {
    	return $this->hasOne(User::class,'id','editer');
    }
}
