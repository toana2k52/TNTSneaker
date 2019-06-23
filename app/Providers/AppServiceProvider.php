<?php

namespace App\Providers;
// use App\Helper\Cart;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\ProductDetail;
use App\Models\Customer_address;
use App\Models\Brand;
use View;
use Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   

        View::composer('*',function($view){
                if(Auth::guard('customer')->check()){
                $cus_id = Auth::guard('customer')->user()->id;
                }else{
                    $cus_id = 0;
                }
                $customer_address_id = Customer_address::where('customer_id',$cus_id)->min('id');
                if ($customer_address_id == null) {
                    $cus_add_id = 1;
                }else{
                    $cus_add_id = $customer_address_id;
                }

                $cart_sum_price = Cart::where('customer_id',$cus_id)->get();
                $ttien = 0;
                foreach ($cart_sum_price as $item_c) {
                    $ttien = $ttien + ($item_c->quantity*$item_c->price);
                }
            $view->with([
                'cats_all' => Category::all(),
                'brand' => Brand::all(),

                'cart_of_cus' => Cart::where('customer_id',$cus_id)->get(),
                'cart_sum' => Cart::where('customer_id',$cus_id)->sum('quantity'),
                'cart_price_all' => $ttien,
                'cart_check' => Cart::where('customer_id',$cus_id)->count(),
                
                'order_sum' => Order::where('customer_id',$cus_id)->where('status','==',1)->where('status','==',0)->count(),

                'customer_address' => $cus_add_id,
                // 'cats_all' => Category::orderBy('name','ASC')->get(),
            ]);
        });

        \Validator::extend('check_old_password', function($attribute,$value,$parameters,$validator){
            return \Hash::check($value, \Auth::user()->password);
        });
        \Validator::extend('check_old_password_user', function($attribute,$value,$parameters,$validator){
            return \Hash::check($value, \Auth::guard('customer')->user()->password);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
