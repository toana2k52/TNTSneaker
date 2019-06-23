<?php 
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Customer_address;
use Illuminate\Http\Request;
/**
 * q``
 */
class OrderController extends Controller
{
    /**
     * summary
     */
    public function index(Request $req)
    {
        $order = Order::orderBy('created_at', 'desc')->paginate(5);
        if ($req->search_order) {
            $order = Order::where('user_name','like','%'.$req->search_order.'%')->paginate(5);
        }
        return view('admin.order.index',[
            'order' => $order
        ]);
       
    }

    public function index_order_detail($order_id, Request $req)
    {   
        $order = Order::where('id',$order_id)->first();
        if ($order->customer_address_id == 0) {
            $customer_add = ['user_name'=>$order->user_name,'user_email'=>$order->user_email,'user_phone'=>$order->user_phone,'user_address'=>$order->user_address];
            $order_price = Order_detail::where('orders_id',$order_id)->sum('price');
            $order_detail = Order_detail::where('orders_id',$order_id)->get();
            return view('admin.order.index_detail',[
                'order' => $order,
                'order_detail' => $order_detail,
                'customer_add' => $customer_add,
                'order_price' => $order_price,
                'check' => 'kvl'
            ]);
        }else{
            $customer_add = Customer_address::where('id',$order->customer_address_id)->first();
            $order_price = Order_detail::where('orders_id',$order_id)->sum('price');
            $order_detail = Order_detail::where('orders_id',$order_id)->get();
            return view('admin.order.index_detail',[
                'order' => $order,
                'order_detail' => $order_detail,
                'customer_add' => $customer_add,
                'order_price' => $order_price,
                'check' => ''
            ]);
        }
       
    }

    public function post_edit($id, Request $req)
    {
        $order = Order::find($id);
        if ($req->isMethod('post')) {
            $req->offsetUnset('_token');
            if ($order->update(['status'=> $req->status,'note' => $req->note])) {
                return redirect()->route('admin.order')->with('success','Cập nhật trạng thái đơn hàng mã'.$id.' thành công!');
            }else{
                 return redirect()->back()->with('error','Cập nhật trạng thái đơn hàng mã'.$id.' không thành công!');
            }

        }
    }
}
?>