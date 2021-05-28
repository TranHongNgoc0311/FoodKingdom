<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tag";
    protected $fillable = ['id','slug','name','created_at','updated_at','deleted'];

    public function blog_tag()
    {
    	return $this->hasMany(Tag::class,'tag_id','id');
    }
}
