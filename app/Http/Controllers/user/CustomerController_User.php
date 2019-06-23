<?php 
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Auth;
use App\Models\Customer_address;
/**
 * q``
 */
class CustomerController_User extends Controller
{
    /**
     * summary
     */
    public function index()
    {
        $customer_add = Customer_address::where('customer_id',Auth::guard('customer')->user()->id)->get();
        return view('user.info.index',[
            'customer_add' => $customer_add
        ]);
    }

    public function customer_edit_info(Request $req)
    {
        $cus = Customer::where('id',Auth::guard('customer')->user()->id)->first();
        if ($req->isMethod('post')) {
            $req->offsetUnset('_token');
        $this->validate($req,[
            'name' => 'required|min:2',
            'email' => 'required|email|unique:customer,email,'.Auth::guard('customer')->user()->id,
            'phone' => 'required',
            'address' => 'required'
        ],[
            'name.required' => 'Họ tên không được để trống!',
            'email.required' => 'Email không được để trống!',
            'phone.required' => 'Điện thoại không được để trống!',
            // 'required' => ':attribute không được để trống!',
            'min' => ':attribute phải có ít nhất :min ký tự!',
            // 'same' => ':attribute không trùng khớp với :other!'
        ]);
            $imge = $cus->image;
            $pass = $cus->password;
            if($req->hasFile('image_pro')){
                $file = $req->image_pro;
                $file->move(base_path('resources/views/admin/customer/uploads'),$file->getClientOriginalName());
                $imge = $file->getClientOriginalName();
            }
            $req->merge(['image' => $imge ]);
            if($cus->update(['name'=>$req->name,'email'=>$req->email,'phone'=>$req->phone,'address'=>$req->address,'image'=>$req->image])) {
                return redirect()->route('user.customer_info')->with('success','Sửa thông tin khách hàng '.$req->name.' thành công!');
            }else{
                 return redirect()->back()->with('error','Sửa thông tin khách hàng '.$req->name.' không thành công!');
            }
        }
            return view('user.info.edit');       
    }
    
    public function reset_password_info()
    {
        return view('user.info.customer_reset_password');
    }
    public function post_reset_password_info(Request $req)
    {
        $this->validate($req,[
            'old_password' => 'required|check_old_password_user',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ],[
            'old_password.check_old_password_user' => 'Mật khẩu cũ không đúng!',
            'old_password.required' => 'Mật khẩu cũ không được để trống!',
            'password.required' => 'Mật khẩu không được để trống!',
            'min' => ':attribute phải có ít nhất :min ký tự!',
            'same' => 'Hai mật khẩu không trùng khớp!'
        ]);
         if (Auth::guard('customer')->user()->update(['password' => bcrypt($req->password)])) {
                return redirect()->route('user.customer_info')->with('success','Thay đổi mật khẩu thành công!');
            }else{
                 return redirect()->back()->with('error','Thay đổi mật khẩu thất bại!');
            }      
    }

    public function customer_address_add()
    {
        return view('user.info.add_customer_address');
    }

    public function post_customer_address_add($id,$check, Request $req)
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
        $ctm = Customer_address::create($req->all());
            if ($ctm) {
                if ($check == 1) {
                    return redirect()->route('user.order',['customer_add_id'=>$ctm->id])->with('success','Thêm mới địa chỉ thành công!');
                }else{  
                return redirect()->route('user.customer_info')->with('success','Thêm mới địa chỉ thành công!');
                }
            }else{
                 return redirect()->back()->with('error','Thêm mới địa chỉ không thành công!');
            }      
    }
    
    public function customer_address_delete($id){
        $cuss = Customer_address::find($id);
        $cus = Customer_address::where('id',$id)->delete();
        if($cus){
            return redirect()->back()->with('success','Xóa địa chỉ khách hàng thành công!');
        }else{
            return redirect()->back()->with('error','xóa địa chỉ khách hàng thất bại!');
        }
    }
    public function customer_address_edit($id, Request $req)
    {
        $cuss_adds = Customer_address::where('id',$id)->first();
        return view('user.info.edit_customer_address',[
            'cuss_adds' => $cuss_adds
        ]); 
    }
    public function post_customer_address_edit($id, Request $req)
    {
        $cuss_adds = Customer_address::find($id);
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
        $req->merge(['customer_id' => Auth::guard('customer')->user()->id]);
            if ($cuss_adds->update($req->all())) {
                return redirect()->route('user.customer_info')->with('success','Chỉnh sửa địa chỉ '.$req->name.' thành công!');
            }else{
                 return redirect()->back()->with('error','Chỉnh sửa địa chỉ '.$req->name.' không thành công!');
            }      
    }
   
}
?>