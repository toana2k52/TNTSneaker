<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Customer_address;
/**
 * q``
 */
class CustomerController extends Controller
{
    /**
     * summary
     */
    public function index( Request $req)
    {
    	$cus = Customer::paginate(5);
        if ($req->search_cus) {
            $cus = Customer::where('name','like','%'.$req->search_cus.'%')->paginate(5);
        }
        return view('admin.customer.index',[
            'cuss' => $cus
        ]);
    }

    public function add()
    {
        return view('admin.customer.add');
    }
    public function post_add(Request $req)
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
                return redirect()->route('admin.customer')->with('success','Thêm mới khách hàng '.$req->name.' thành công!');
            }else{
                 return redirect()->back()->with('error','Thêm mới khách hàng '.$req->name.' không thành công!');
            }
        return view('admin.customer.add');       
    }

    public function edit($id,Request $req)
    {
        $cus = Customer::find($id);
        if ($req->isMethod('post')) {
            $req->offsetUnset('_token');
        $this->validate($req,[
            'name' => 'required|min:2',
            'email' => 'required|email|unique:customer,email,'.$id,
            'phone' => 'required',
            'address' => 'required',
            'status' => 'required'
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
            if($req->hasFile('password')){
                $password = bcrypt($req->password);
                $req->merge(['password'=> $password]);
            }else{
                $req->merge(['password'=> $pass]);
            }
            if($cus->update($req->all())) {
                return redirect()->route('admin.customer')->with('success','Sửa thông tin khách hàng '.$req->name.' thành công!');
            }else{
                 return redirect()->back()->with('error','Sửa thông tin khách hàng '.$req->name.' không thành công!');
            }
        }
            return view('admin.customer.edit',['cuss' => $cus]);       
    }
    public function delete($id){
        $cuss = Customer::find($id);
        $cus = Customer::where('id',$id)->delete();
        if($cus){
            return redirect()->back()->with('success','Xóa khách hàng '.$cuss->name.' thành công!');
        }else{
            return redirect()->back()->with('error','xóa khách hàng '.$cuss->name.' thất bại!');
        }
    }

    public function customer_address_index($id, Request $req)
    {
        $cuss = Customer::find($id);
        $cus_adds = Customer_address::where('customer_id',$id)->paginate(6);
        if ($req->search_add) {
            $cus_adds = Customer_address::where('name','like','%'.$req->search_add.'%')->where('customer_id',$id)->paginate(6);
        }
        return view('admin.customer.customer_address',[
            'cuss' => $cuss,
            'cus_adds'=> $cus_adds
        ]);
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

    public function customer_address_edit($id,$id_cuss)
    {
        $cus_adds = Customer_address::find($id);
        $cuss = Customer::find($id_cuss);
        return view('admin.customer.customer_address-edit',[
            'cuss' => $cuss,
            'cus_adds' => $cus_adds
        ]);
    }
    public function post_customer_address_edit($id,$id_cuss, Request $req)
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
        $customer_id = $id_cuss;
        $req->merge(['customer_id' => $customer_id ]);
            if ($cuss_adds->update($req->all())) {
                return redirect()->route('admin.customer-customer_address',['id'=>$id_cuss])->with('success','Chỉnh sửa địa chỉ '.$req->name.' thành công!');
            }else{
                 return redirect()->back()->with('error','Chỉnh sửa địa chỉ '.$req->name.' không thành công!');
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
}
?>