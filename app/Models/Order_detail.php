<?php

namespace App\Models;
use App\Models\ProductDetail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Order_detail extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'orders_detail';
    protected $fillable = [
        'orders_id','product_detail_id','product_name','price','quantity'
    ];

    public function pro_detail(){
        return $this->hasOne(ProductDetail::class,'id','product_detail_id');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
