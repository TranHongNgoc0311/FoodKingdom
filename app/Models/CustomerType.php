<?php

namespace App\Models;

use App\Customer;
use Illuminate\Database\Eloquent\Model;

class CustomerType extends Model
{
    protected $table = "customer_type";
    protected $fillable = ['id','name','created_at','updated_at','bonus','sale_percent','condition_type'];

    public function history()
    {
    	return $this->hasMany(CustomerHistory::class,'type_id','id');
    }
}
