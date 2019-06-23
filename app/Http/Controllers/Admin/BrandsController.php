<?php 
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Http\Request;
/**
 * q``
 */
class BrandsController extends Controller
{
    /**
     * summary
     */
    public function index(Request $req)
    {
        $brand = Brand::paginate();
        if ($req->search_brand) {
            $brand = Brand::where('name','like','%'.$req->search_brand.'%')->paginate();
        }
        return view('admin.brand.index',[
            'brand' => $brand
        ]);
       
    }
    public function add(){

    }
    public function post_add(Request $req){
        $this->validate($req,[
            'name' => 'required|unique:brand,name'
        ],[
            'name.required' => 'Tên thương hiệu không được để trống!!!',
            'name.unique' => 'Sản phẩm đã tồn tại!!!'
        ]);
        if (Brand::create($req->all())) {
            return redirect()->route('admin.brands')->with('success','Thêm thương hiệu '.$req->name.' thành công!');
        }else{
            return redirect()->back()->with('error','Thêm thương hiệu '.$req->name.' không thành công!');
        }
    }

    public function edit($id, Request $req)
    {
        $brand = Brand::find($id);
        return view('admin.brand.edit',[
            'brand' => $brand
        ]);
    }

    public function post_edit($id, Request $req)
    {
        $brand = Brand::find($id);
        if ($req->isMethod('post')) {
            $req->offsetUnset('_token');
            $this->validate($req,[
                'name' => 'required|unique:brand,name,'.$id
            ],[
                'name.required' => 'Tên thương hiệu không được để trống!!!',
                'name.unique' => 'Tên thương hiệu đã tồn tại!!!'

            ]);
            if (Brand::where(['id'=>$id])->update($req->all())) {
                return redirect()->route('admin.brands')->with('success','Sửa thương hiệu '.$req->name.' thành công!');
            }else{
                 return redirect()->back()->with('error','Sửa thương hiệu '.$req->name.' không thành công!');
            }

        }
    }


    public function delete($id){
        $brand = Brand::find($id);
        $br = Brand::where('id',$id)->delete();
        if($br){
            return redirect()->back()->with('success','Xóa thương hiệu '.$brand->name.' thành công!');
        }else{
            return redirect()->back()->with('error','xóa thương hiệu '.$brand->name.' thất bại!');
        }
    }
}
?>