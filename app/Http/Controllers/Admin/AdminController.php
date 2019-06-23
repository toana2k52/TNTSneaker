<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
/**
 * q``
 */
class AdminController extends Controller
{
    /**
     * summary
     */
    public function index_member(Request $req)
    {
    	$ad = Admin::paginate(5);
        if ($req->search_ad) {
            $ad = Admin::where('name','like','%'.$req->search_ad.'%')->paginate(5);
        }
        return view('admin.member.index',[
            'ads' => $ad
        ]);
    }
      public function index()
    {
        return view('admin.main.index');
    }
     public function login()
    {
        return view('admin.login.login');
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
        if (Auth::attempt($req->only('email','password'),$req->has('remember'))) {
           return redirect()->route('admin');
        }else{
             return redirect()->back()->with('error','Email hoặc mật khẩu không chính xác!');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function register_admin()
    {
        return view('admin.login.register_admin');
    }
    public function post_register_admin(Request $req)
    {
        $this->validate($req,[
            'name' => 'required|min:2',
            'email' => 'required|email|unique:admin,email',
            'phone' => 'required',
            'address' => 'required',
            'position' => 'required',
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
                    $file->move(base_path('resources/views/admin/member/uploads'),$file->getClientOriginalName());
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

         if (Admin::create($req->all())) {
                return redirect()->route('admin.member')->with('success','Thêm mới nhân viên '.$req->name.' thành công!');
            }else{
                 return redirect()->back()->with('error','Thêm mới nhân viên '.$req->name.' không thành công!');
            }
            return view('register_admin');       
    }

    public function edit($id,Request $req)
    {
        $ad = Admin::find($id);
        if ($req->isMethod('post')) {
            $req->offsetUnset('_token');
        $this->validate($req,[
            'name' => 'required|min:2',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'position' => 'required',
            'password' => 'required|min:6'
        ],[
            'name.required' => 'Họ tên không được để trống!',
            'email.required' => 'Email không được để trống!',
            'phone.required' => 'Điện thoại không được để trống!',
            'password.required' => 'Mật khẩu không được để trống!',
            // 'required' => ':attribute không được để trống!',
            'min' => ':attribute phải có ít nhất :min ký tự!',
            // 'same' => ':attribute không trùng khớp với :other!'
        ]);
            $imge = $ad->image;
            if($req->hasFile('image_pro')){
                $file = $req->image_pro;
                $file->move(base_path('resources/views/admin/product/uploads'),$file->getClientOriginalName());
                $imge = $file->getClientOriginalName();
            }
            $req->merge(['image' => $imge ]);

            $password = bcrypt($req->password);
            $req->merge(['password'=> $password]);
            if($ad->update($req->all())) {
                return redirect()->route('admin.member')->with('success','Sửa thông nhân viên '.$req->name.' thành công!');
            }else{
                 return redirect()->back()->with('error','Sửa thông tin nhân viên '.$req->name.' không thành công!');
            }
        }
            return view('admin.member.edit',['ad' => $ad]);       
    }
    public function delete($id){
        $ads = Admin::find($id);
        $ad = Admin::where('id',$id)->delete();
        if($ad){
            return redirect()->back()->with('success','Xóa nhân viên '.$ads->name.' thành công!');
        }else{
            return redirect()->back()->with('error','xóa nhân viên '.$ads->name.' thất bại!');
        }
    }

    public function index_info(){
        $id = Auth::user()->id;
        $ads = Admin::find($id);
        return view('admin.info.index',[
            'ads' => $ads
        ]);
    }

    public function reset_password()
    {
        return view('admin.login.reset_password');
    }
    public function post_reset_password(Request $req)
    {
        $this->validate($req,[
            'old_password' => 'required|check_old_password',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ],[
            'old_password.check_old_password' => 'Mật khẩu cũ không đúng!',
            'old_password.required' => 'Mật khẩu cũ không được để trống!',
            'password.required' => 'Mật khẩu không được để trống!',
            'min' => ':attribute phải có ít nhất :min ký tự!',
            'same' => 'Hai mật khẩu không trùng khớp!'
            // 'same' => ':attribute không trùng khớp với :other!'
        ]);
         if (Auth::user()->update(['password' => bcrypt($req->password)])) {
                return redirect()->route('reset_password')->with('success','Thay đổi mật khẩu thành công!');
            }else{
                 return redirect()->back()->with('error','Thay đổi mật khẩu thất bại!');
            }      
    }
}
?>