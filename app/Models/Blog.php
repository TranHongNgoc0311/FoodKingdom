<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = "blog";
    protected $fillable = ['id','title','writer','image','view','slug','content','deleted','status','created_at','updated_at'];

    public function blog_tag()
    {
        return $this->hasMany(Blog_tag::class,'blog_id','id');
    }

    public function editer()
    {
        return $this->hasMany(Blog_editer::class,'blog_id','id');
    }

    public function comments()
    {
    	return $this->hasMany(Comments::class,'blog_id','id');
    }

    public function user()
    {
    	return $this->hasOne(User::class,'id','writer');
    }
}
