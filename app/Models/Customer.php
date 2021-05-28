<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use Notifiable;
    protected $table = "customer";
    protected $guard = "customer";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','username', 'email','phone','birth' ,'password','created_at','updated_at','deleted','avatar','first_name','last_name','address','gender','provider_id','provider','point'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function type_history()
    {
        return $this->hasMany(CustomerHistory::class,'customer_id','id');
    }

    public function order()
    {
        return $this->hasMany(Order::class,'customer_id','id');
    }
}
