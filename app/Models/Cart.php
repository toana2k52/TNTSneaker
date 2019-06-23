<?php

namespace App\Models;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cart extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'cart';
    protected $fillable = [
        'customer_id','product_id','product_detail_id','price','quantity'
    ];

    public function pro_cart(){
        return $this->hasOne(Product::class,'id','product_id');
    }
    public function pro_cart_detail(){
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
