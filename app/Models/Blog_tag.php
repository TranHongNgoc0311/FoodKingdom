<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog_tag extends Model
{
    protected $table = "blog_tag";
    protected $fillable = ['blog_id','tag_id','created_at','updated_at'];

    public function blog()
    {
    	return $this->hasOne(Blog::class,'id','blog_id');
    }
    
    public function tag()
    {
    	return $this->hasOne(Tag::class,'id','tag_id');
    }
}
