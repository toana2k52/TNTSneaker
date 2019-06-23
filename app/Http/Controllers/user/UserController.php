<?php 
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ProductImage;
use App\Models\Customer;
use App\Models\Customer_address;
use App\Models\Cart;
use App\Cart_user\Cart_user;
use View;
/**
 * q``
 */
class UserController extends Controller
{
    /**
     * summary
     */
    public function __construct()
        {
           $this->middleware(function ($request, $next){
                View::share([
                    'cart_user' => new Cart_user()
                ]);
                return $next($request);
           });
        }
    public function index()
    {   $pros_min_id = Product::min('id');
        $pros_max_id = Product::max('id');
        
        do{
            $rd = rand($pros_min_id,$pros_max_id);
            $pros_1 = Product::where('id',$rd)->first();
            if($pros_1 == null){
                $check1 = 1;
            }else{
                $check1 = $pros_1->listed_price-$pros_1->listed_price_sale;
            }
        }while($pros_1 == null || $check1 == 0);
        do{    
            do{
            $rd2 = rand($pros_min_id,$pros_max_id);
            }while($rd2 == $rd);
            $pros_2 = Product::where('id',$rd2)->first();
            if($pros_2 == null){
                $check2 = 2;
            }else{
                $check2 = $pros_2->listed_price-$pros_2->listed_price_sale;
            }
        }while($pros_2 == null || $check2 == 0);
        do{
            do{
            $rd3 = rand($pros_min_id,$pros_max_id);
            }while($rd3 == $rd || $rd3 == $rd2);
            $pros_3 = Product::where('id',$rd3)->first();
            if($pros_3 == null){
                $check3 = 3;
            }else{
                $check3 = $pros_3->listed_price-$pros_3->listed_price_sale;
            }
        }while($pros_3 == null || $check3 == 0);
        do{
            do{
            $rd4 = rand($pros_min_id,$pros_max_id);
            }while($rd4 == $rd3 || $rd4 == $rd2 || $rd4 == $rd);
            $pros_4 = Product::where('id',$rd4)->first();
            if($pros_4 == null){
                $check4 = 4;
            }else{
                $check4 = $pros_4->listed_price-$pros_4->listed_price_sale;
            }
        }while($pros_4 == null || $check4 == 0);
        do{
            do{
            $rd5 = rand($pros_min_id,$pros_max_id);
            }while($rd5 == $rd4 || $rd5 == $rd3 || $rd5 == $rd2 || $rd5 == $rd);
            $pros_5 = Product::where('id',$rd5)->first();
            if($pros_5 == null){
                $check5 = 5;
            }else{
                $check5 = $pros_5->listed_price-$pros_5->listed_price_sale;
            }
        }while($pros_5 == null || $check5 == 0);

        $pros_hot = Product::orderBy('created_at', 'desc')->limit(4)->get();

        
        
        return view('user.main.index',[
            'pros_hot' => $pros_hot,
            'pros_1' =>$pros_1,
            'pros_2' =>$pros_2,
            'pros_3' =>$pros_3,
            'pros_4' =>$pros_4,
            'pros_5' =>$pros_5,
        ]);
    }

    public function login()
    {
        
        return view('user.login_register.login');
    }

    public function post_login(Request $req)
    {
        $this->validate($req,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ],[
            'email.required' => 'Email không được để trống!',
            'password.required' => 'Mật khẩu không được để trống!'
        ]);
        if (Auth::guard('customer')->attempt($req->only('email','password'),$req->has('remember'))) {
            if (Auth::guard('customer')->user()->status == 0) {
                return redirect()->route('user');
            }else{
                return redirect()->back()->with('error','Tài khoản của bạn tạm thời bị khóa, vui lòng liên hệ trợ giúp để được hỗ trợ!');
            }
           
        }else{
            return redirect()->back()->with('error','Email hoặc mật khẩu không chính xác!');
        }
    }
    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('user');
    }

    public function register()
    {
        return view('user.login_register.register');
    }
    public function post_register(Request $req)
    {
        $this->validate($req,[
            'name' => 'required|min:2',
            'email' => 'required|email|unique:customer,email',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ],[
            'name.required' => 'Họ tên không được để trống!',
            'email.required' => 'Email không được để trống!',
            'phone.required' => 'Điện thoại không được để trống!',
            'password.required' => 'Mật khẩu không được để trống!',
            // 'required' => ':attribute không được để trống!',
            'unique' => ':attribute đã được sử dụng!',
            'min' => ':attribute phải có ít nhất :min ký tự!',
            'same' => 'Hai mật khẩu không trùng khớp!'
            // 'same' => ':attribute không trùng khớp với :other!'
        ]);
        if($req->hasFile('image_pro')){
                $file = $req->image_pro;
                $file_ex = $file->getClientOriginalExtension('image_pro');
                if ($file_ex == "jpg" || $file_ex == "png" || $file_ex == "jpeg" || $file_ex == "gif") {
                    $file->move(base_path('resources/views/admin/customer/uploads'),$file->getClientOriginalName());
                    $imge = $file->getClientOriginalName();
                }
            }else{
                $imge = "member_null.png";
            }
        $req->merge(['image' => $imge ]);
        $password = bcrypt($req->password); //Mã hóa password rồi gán vào biến $password
        $req->offsetUnset('confirm_password');
        $req->offsetUnset('_token','password'); // Loại bỏ giá trị password có sẵn truyền vào
        $req->merge(['password'=> $password]); // Sau khi xóa password cũ thêm lại giá trị $password mới vừa được mã hóa vào

            if (Customer::create($req->all())) {
                return redirect()->route('user.login')->with('success','Đăng ký tài khoản '.$req->email.' thành công, đăng nhập ngay để hưởng nhiều ưu đãi!');
            }else{
                 return redirect()->back()->with('error','Lỗi! Đăng ký tài khoản '.$req->email.' không thành công!');
            }     
    }

    public function customer_address_add($id)
    {
        $cuss = Customer::find($id);
        return view('admin.customer.customer_address-add',[
            'cuss' => $cuss
        ]);
    }
    public function post_customer_address_add($id, Request $req)
    {
        $this->validate($req,[
            'name' => 'required|min:2',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ],[
            'name.required' => 'Họ tên không được để trống!',
            'email.required' => 'Email không được để trống!',
            'phone.required' => 'Điện thoại không được để trống!',
            'address.required' => 'Địa chỉ không được để trống!',
            'min' => ':attribute phải có ít nhất :min ký tự!'
        ]);
        $customer_id = $id;
        $req->merge(['customer_id' => $customer_id ]);
            if (Customer_address::create($req->all())) {
                return redirect()->route('admin.customer-customer_address',['id'=>$customer_id])->with('success','Thêm mới địa chỉ '.$req->name.' thành công!');
            }else{
                 return redirect()->back()->with('error','Thêm mới địa chỉ '.$req->name.' không thành công!');
            }      
    }




    public function add_cart_user($id,$check, Cart_user $cart){
        if($check == 0){
            $quantity = 1;
            $pro_detail = ProductDetail::where('id',$id)->first();
            $pro = Product::where('id',$pro_detail->product_id)->first();
            if($pro_detail){
                $size = $pro_detail->size;
                $cart->add($pro_detail,$pro,$quantity,$size);
            }
            return redirect()->route('user');
        }
    }

    public function post_add_cart_user($id, Request $req, Cart_user $cart){
        $pro_detail = ProductDetail::where('product_id',$id)->where('size',$req->size)->first();
        if($pro_detail == null){
            return redirect()->back()->with('error','Rất xin lỗi size giày này hiện tại không thể đáp ứng, liên hệ hotline để được trợ giúp!');
        }else{
            $quantity = $req->quantity;
            $size = $req->size;
            if($pro_detail->amount < $req->quantity){
                return redirect()->back()->with('error','Rất xin lỗi size giày này hiện tại không thể đáp ứng, liên hệ hotline để được trợ giúp!');
            }else{
                $pro = Product::where('id',$pro_detail->product_id)->first();
                if($pro_detail){
                    $cart->add($pro_detail,$pro,$quantity,$size);
                }
                return redirect()->route('user');
            }
        }
        
        
    }

    public function update_cart_user($id, Request $req, Cart_user $cart){
        $quantity = $req->quantity;
        $cart->update($id,$quantity);
        return redirect()->back()->with('success','Chỉnh sửa số lượng sản phẩm thành công!');
    }
    public function delete_cart_user($id, Cart_user $cart){
        $cart->delete($id);
        return redirect()->back()->with('success','Xóa sản phẩm khỏi giỏ hàng thành công!');
    }
    public function clear_cart_user(Cart_user $cart){
        $cart->clear();
        return redirect()->back()->with('success','Xóa đơn hàng thành công!');
    }

}
?>