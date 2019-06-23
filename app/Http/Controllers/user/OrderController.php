<?php 
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Customer_address;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\ProductDetail;
use App\Models\Cart;
use App\Cart_user\Cart_user;
/**
 * q``
 */
class OrderController extends Controller
{
    /**
     * summary
     */
    public function index_list()
    {
        $order_all = Order::orderBy('created_at', 'desc')->where('customer_id',Auth::guard('customer')->user()->id)->get();
        return view('user.order.index',[
            'order_all' => $order_all
        ]);
    }

    public function order_detail_list($order_id, Request $req)
    {   
        $order = Order::where('id',$order_id)->first();
        $customer_add = Customer_address::where('id',$order->customer_address_id)->first();
        $order_price = Order_detail::where('orders_id',$order_id)->sum('price');
        $order_detail = Order_detail::where('orders_id',$order_id)->get();
        return view('user.order.order_detail_list',[
            'order' => $order,
            'order_detail' => $order_detail,
            'customer_add' => $customer_add,
            'order_price' => $order_price
        ]);
       
    }
    public function order_detail_list_edit($id)
    {   
        $order = Order::find($id);
            if ($order->update(['status'=> 3 ])) {
                return redirect()->route('user.order_list')->with('success','Hủy đơn hàng mã'.$id.' thành công!');
            }else{
                 return redirect()->back()->with('error','Hủy đơn hàng mã'.$id.' không thành công!');
            }
       
    }
    public function index($customer_add_id)
    {
        if ($customer_add_id == 0) {
           
            return view('user.order.order_select_address');

        }else{
            $customer_add_all = Customer_address::where('customer_id',Auth::guard('customer')->user()->id)->get();
            $customer_add = Customer_address::where('id',$customer_add_id)->where('customer_id',Auth::guard('customer')->user()->id)->first();
            return view('user.order.order_select_address',[
                'customer_add_all' => $customer_add_all,
                'customer_add' => $customer_add,
            ]);
        }
        
    }

    public function index_order_detail($customer_address_id, Request $req)
    {
        if(Auth::guard('customer')->check()){
            $cart_of_cus = Cart::where('customer_id',Auth::guard('customer')->user()->id)->get();
            $cart_sum = Cart::where('customer_id',Auth::guard('customer')->user()->id)->sum('quantity');
            $req->merge(['customer_id' => Auth::guard('customer')->user()->id,'customer_address_id'=>$customer_address_id,'user_name'=>Auth::guard('customer')->user()->name,'user_email'=>Auth::guard('customer')->user()->email,'user_phone'=>Auth::guard('customer')->user()->phone,'user_address'=>Auth::guard('customer')->user()->address,'quantity'=>$cart_sum,'status'=>0]);
            $order = Order::create($req->all());
            if ($order) {
                $req->merge(['orders_id' =>$order->id]);
                foreach ($cart_of_cus as $cart_of_c){ 
                    $req->merge(['product_detail_id' =>$cart_of_c->product_detail_id,'product_name' =>$cart_of_c->pro_cart->name,'price' =>$cart_of_c->price,'quantity' => $cart_of_c->quantity]);
                    $order_detail = Order_detail::create($req->all());
                    if ($order_detail) {
                        $product_detail = ProductDetail::find($cart_of_c->product_detail_id);
                        $amount_new = $product_detail->amount - $cart_of_c->quantity;
                        if($product_detail->update(['amount'=> $amount_new])){

                        }
                    }
                }
                $cart_de_all = Cart::where('customer_id',Auth::guard('customer')->user()->id)->delete();
                if ($cart_de_all){
                    $od_dt = Order_detail::where('orders_id',$order->id)->get();
                    $customer_add = Customer_address::where('id',$customer_address_id)->first();
                    $order_price = Order_detail::where('orders_id',$order->id)->sum('price');
                    return view('user.order.order_detail',[
                        'od_dt' => $od_dt,
                        'customer_add' => $customer_add,
                        'order_price' => $order_price
                    ]);
                }
                
            }
        }

    }

    public function add_order_detail_user( Request $req, Cart_user $cart)
    {
        $tsl = 0;
        foreach (session('cart_user') as $item) {
            $tsl = $tsl + $item['quantity'];
        }
            $req->merge(['customer_id' => 0,'customer_address_id'=>0,'user_name'=>$req->name,'user_email'=>$req->email,'user_phone'=>$req->phone,'user_address'=>$req->address,'quantity'=>$tsl,'status'=>0]);
            $order = Order::create($req->all());
            if ($order) {
                $req->merge(['orders_id' =>$order->id]);
                foreach (session('cart_user') as $cart_of_c){ 
                    $req->merge(['product_detail_id' =>$cart_of_c['product_detail_id'],'product_name' =>$cart_of_c['name'],'price' =>$cart_of_c['price'],'quantity' => $cart_of_c['quantity']]);
                    $order_detail = Order_detail::create($req->all());
                    if ($order_detail) {
                        $product_detail = ProductDetail::find($cart_of_c['product_detail_id']);
                        $amount_new = $product_detail->amount - $cart_of_c['quantity'];
                        if($product_detail->update(['amount'=> $amount_new])){

                        }
                    }
                }
                $cart->clear();
                $od_dt = Order_detail::where('orders_id',$order->id)->get();
                $customer_add = ['user_name'=>$req->name,'user_email'=>$req->email,'user_phone'=>$req->phone,'user_address'=>$req->address];
                $order_price = Order_detail::where('orders_id',$order->id)->sum('price');
                return view('user.order.order_detail',[
                    'od_dt' => $od_dt,
                    'customer_add' => $customer_add,
                    'order_price' => $order_price
                ]);
                
            }

    }
}
?>