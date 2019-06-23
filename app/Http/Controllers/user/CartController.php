<?php 
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Customer;
/**
 * q``
 */
class CartController extends Controller
{
    /**
     * summary
     */
    public function index()
    {
    	
        return view('user.cart.index');
    }

    public function add($customer_id,$product_detail_id,$quantity, Request $req)
    {   
        $pro = ProductDetail::where('id',$product_detail_id)->first();
        if($pro->price_sale == 0){
            $pri = $pro->price;
        }else{
            $pri = $pro->price_sale;
        }
        $car_old = Cart::where('product_detail_id',$product_detail_id)->where('customer_id',$customer_id)->first();
        if($car_old != null){
            $req->merge(['customer_id' => $customer_id, 'product_id'=>$pro->product_id, 'product_detail_id'=>$pro->id, 'price'=>$pri, 'quantity'=>$car_old->quantity+$quantity]);
            if ($car_old->update($req->all())) {
                return redirect()->route('user')->with('success','Thêm sản phẩm vào giỏ hàng thành công!');
            }else{
                 return redirect()->back()->with('error','Thêm sản phẩm vào giỏ hàng không thành công!');
            }  
        }else{
            $req->merge(['customer_id' => $customer_id, 'product_id'=>$pro->product_id, 'product_detail_id'=>$pro->id, 'price'=>$pri, 'quantity'=>$quantity]);
            if (Cart::create($req->all())) {
                return redirect()->route('user')->with('success','Thêm sản phẩm vào giỏ hàng thành công!');
            }else{
                 return redirect()->back()->with('error','Thêm sản phẩm vào giỏ hàng không thành công!');
            }  
        }    
    }

    public function post_add($customer_id,$product_detail_id,$quantity,$product_id, Request $req)
    {   
        if($req->has('size')){
            $pro = ProductDetail::where('size',$req->size)->where('product_id',$product_id)->where('color',$req->color)->first();
        }else{
            $pro = ProductDetail::where('id',$product_detail_id)->first();
        }
        if($pro->price_sale == 0){
            $pri = $pro->price;
        }else{
            $pri = $pro->price_sale;
        }
        if($req->has('quantity') && $req->quantity >= 1){
            $quantity = $req->quantity;
            $req->offsetUnset('quantity');
        }
        $car_old = Cart::where('product_detail_id',$pro->id)->first();
        if($car_old != null){
            $req->merge(['customer_id' => $customer_id, 'product_id'=>$pro->product_id, 'product_detail_id'=>$pro->id, 'price'=>$pri, 'quantity'=>$car_old->quantity+$quantity]);
            if ($car_old->update($req->all())) {
                return redirect()->route('user')->with('success','Thêm sản phẩm vào giỏ hàng thành công!');
            }else{
                 return redirect()->back()->with('error','Thêm sản phẩm vào giỏ hàng không thành công!');
            }  
        }else{
            $req->merge(['customer_id' => $customer_id, 'product_id'=>$pro->product_id, 'product_detail_id'=>$pro->id,'price'=>$pri, 'quantity'=>$quantity]);
            if (Cart::create($req->all())) {
                return redirect()->route('user')->with('success','Thêm sản phẩm vào giỏ hàng thành công!');
            }else{
                 return redirect()->back()->with('error','Thêm sản phẩm vào giỏ hàng không thành công!');
            }  
        }    
    }

    public function post_update_quantity($id, Request $req)
    { 
        $cart = Cart::where('id',$id)->first();
        $product = ProductDetail::where('id',$cart->product_detail_id)->first();
        if($req->has('quantity')){
            if ($req->quantity >= 1) {
                if ($req->quantity <= $product->amount) {
                    $quantity = $req->quantity;
                    $req->offsetUnset('quantity');
                }else{
                    return redirect()->back()->with('error','Rất tiếc, số lượng sản phẩm bạn đặt hiện tại không đủ hàng (SL tồn kho đáp ứng: '.$product->amount.' ), vui lòng liên hệ hotline: 0354859494 để đặt hàng và được trợ giúp. Xin cảm ơn!');
                }
            }else{
                return redirect()->back()->with('error','Lỗi! Số lượng hàng đặt phải lớn hơn 1');
            }
        if($cart != null){
            $req->merge(['quantity'=>$quantity]);
            if ($cart->update($req->all())) {
                return redirect()->route('user.cart')->with('success','Cập nhật số lượng sản phẩm thành công!');
            }else{
                 return redirect()->back()->with('error','Cập nhật số lượng sản phẩm không thành công!');
            }  
        }    
        }
    }

    public function delete($id)
    {   
        $carts_de = Cart::find($id);
        $cart_de = Cart::where('id',$id)->delete();
        if($cart_de){
            return redirect()->back()->with('success','Xóa sản phẩm khỏi giỏ hàng thành công!');
        }else{
            return redirect()->back()->with('error','xóa sản phẩm khỏi giỏ hàng thất bại!');
        }
    }

    public function delete_all($customer_id)
    {  
        $cart_de_all = Cart::where('customer_id',$customer_id)->delete();
        if($cart_de_all){
            return redirect()->back()->with('success','Bạn đã xóa tất cả sản phẩm trong giỏ hàng!');
        }else{
            return redirect()->back()->with('error','Xóa tất cả sản phẩm khỏi giỏ hàng thất bại!');
        }
    }
}
?>