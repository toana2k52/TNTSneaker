<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Brand;
use App\Models\ProductImage;
use App\Models\ProductDetail;

class Product extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'product';
    protected $fillable = [
        'category_id','name','slug','brand_id','image_ava','listed_price','listed_price_sale'
    ];
    public function prod_cat()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function prod_brand()
    {
        return $this->hasOne(Brand::class,'id','brand_id');
    }
    public function prod_image()
    {
        return $this->hasMany(ProductImage::class,'product_id','id');
    }
    public function prod_detail()
    {
        return $this->hasMany(ProductDetail::class,'product_id','id');
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
