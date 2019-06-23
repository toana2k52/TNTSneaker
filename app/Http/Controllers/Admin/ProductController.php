<?php 
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\ProductImage;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
/**
 * q``
 */
class ProductController extends Controller
{
    /**
     * summary
     */
    public function index(Request $req)
    {
        $pros = Product::paginate(10, ['*'], 'page_pro');
        $pros_detail = ProductDetail::where('product_id',1)->paginate(10, ['*'], 'page_detail');
        if ($req->search_pros) {
            $pros = Product::where('name','like','%'.$req->search_pros.'%')->paginate(10, ['*'], 'page_pro');
        }
        return view('admin.product.index',[
            'pros' => $pros,
            'pros_detail' => $pros_detail
        ]);
       
    }
    public function index_dt($id,Request $req)
    {
        $pros = Product::paginate(10, ['*'], 'page_pro');
        $pros_detail = ProductDetail::where('product_id',$id)->paginate(10, ['*'], 'page_detail');
        if ($req->search_pros) {
            $pros = Product::where('name','like','%'.$req->search_pros.'%')->paginate(10, ['*'], 'page_pro');
        }
        return view('admin.product.index',[
            'pros' => $pros,
            'pros_detail' => $pros_detail
        ]);
       
    }
    public function add(){
        return view('admin.product.add',[
            'cats'  => Category::all(),
            'brands'  => Brand::all()
        ]);

    }

    public function post_add(Request $req){
        $this->validate($req,[
            'name' => 'required|unique:product,name',
            'price' => 'required',
            'color' => 'required',
            'amount' => 'required',
            'content' => 'required',
            'image_pro' => 'required',
            'image_ava_check' => 'required',
            'listed_price' => 'required',
        ],[
            'name.required' => 'Tên sản phẩm không được để trống!!!',
            'price.required' => 'Giá sản phẩm không được để trống!!!',
            'listed_price.required' => 'Giá niên yết sản phẩm không được để trống!!!',
            'content.required' => 'Mô tả sản phẩm không được để trống!!!',
            'color.required' => 'Màu sắc sản phẩm không được để trống!!!',
            'amount.required' => 'Số lượng sản phẩm không được để trống!!!',
            'image_ava_check.required' => 'Ảnh đại diện sản phẩm không được để trống!!!',
            'image_pro.required' => 'Ảnh đại diện chi tiết sản phẩm không được để trống!!!',
            'name.unique' => 'Sản phẩm đã tồn tại!!!'
        ]);
        $imge_ava = [];
        if($req->hasFile('image_ava_check')){
            $file = $req->image_ava_check;
            $file->move(base_path('resources/views/admin/product/uploads'),$file->getClientOriginalName());
            $imge_ava = $file->getClientOriginalName();
        }
        $imge = [];
        if($req->hasFile('image_pro')){
            $file = $req->image_pro;
            $file->move(base_path('resources/views/admin/product/uploads'),$file->getClientOriginalName());
            $imge = $file->getClientOriginalName();
        }
        $req->merge(['image' => $imge,'image_ava' =>$imge_ava ]);
        if($req->size_all == 1){
            $prod = Product::create($req->all());
                    for ($i=35; $i <=44; $i++) {
                    $req->merge(['size'=> $i]);
                    if ($prod) {
                        $product_id = $prod->id;
                        $req->merge(['product_id'=> $product_id]);
                        ProductDetail::create($req->all());  
                        }
                    }
                    if ($prod) {
                        if($req->other_img == null){
                            return redirect()->route('admin.product')->with('success','Thêm sản phẩm '.$req->name.' thành công!');
                        }else{
                            foreach($req->other_img as $other){
                                    $other->move(base_path('resources/views/admin/product/uploads'),$other->getClientOriginalName());
                                    $other_name = $other->getClientOriginalName();
                                    ProductImage::create([
                                        'image' => $other_name,
                                        'product_id' => $product_id
                                    ]);
                                }
                            return redirect()->route('admin.product')->with('success','Thêm sản phẩm '.$req->name.' thành công!');
                            }
                        }else{
                            return redirect()->back()->with('error','Thêm sản phẩm '.$req->name.' không thành công!'); 
                        }
        }else{
                if($req->size_min != 0 && $req->size_max != 0){
                    $prod = Product::create($req->all());
                    for ($i=$req->size_min; $i <=$req->size_max; $i++) {
                    $req->merge(['size'=> $i]);
                    if ($prod) {
                        $product_id = $prod->id;
                        $req->merge(['product_id'=> $product_id]);
                        ProductDetail::create($req->all());  
                        }
                    }
                    if ($prod) {
                        foreach($req->other_img as $other){
                                $other->move(base_path('resources/views/admin/product/uploads'),$other->getClientOriginalName());
                                $other_name = $other->getClientOriginalName();
                                ProductImage::create([
                                    'image' => $other_name,
                                    'product_id' => $product_id
                                ]);
                            }
                        return redirect()->route('admin.product')->with('success','Thêm sản phẩm '.$req->name.' thành công!');
                        }else{
                            return redirect()->back()->with('error','Thêm sản phẩm '.$req->name.' không thành công!'); 
                        }
                }
            }
    }
    public function add_detail($id){
        return view('admin.product.add_detail',[
            'cats'  => Category::all(),
            'brands'  => Brand::all(),
            'pro'  => Product::find($id)
        ]);
    }
     public function post_add_detail($id, Request $req){
        $this->validate($req,[
            'price' => 'required',
            'color' => 'required',
            'amount' => 'required',
            'content' => 'required',
            'image_pro' => 'required'
        ],[
            'price.required' => 'Giá sản phẩm không được để trống!!!',
            'content.required' => 'Mô tả sản phẩm không được để trống!!!',
            'color.required' => 'Màu sắc sản phẩm không được để trống!!!',
            'amount.required' => 'Số lượng sản phẩm không được để trống!!!',
            'image_pro.required' => 'Ảnh đại diện sản phẩm không được để trống!!!'
        ]);

        $imge = [];
        if($req->hasFile('image_pro')){
            $file = $req->image_pro;
            $file->move(base_path('resources/views/admin/product/uploads'),$file->getClientOriginalName());
            $imge = $file->getClientOriginalName();
        }
        $req->merge(['image' => $imge ]);
        $req->merge(['product_id'=> $id]);

        if($req->size_all == 1){
                    for ($i=35; $i <=44; $i++) {
                        $req->merge(['size'=> $i]);
                        ProductDetail::create($req->all());  
                    }
                    return redirect()->route('admin.product')->with('success','Thêm thuộc tính sản phẩm '.$req->name.' thành công!');
        }else{
                if($req->size_min != 0 && $req->size_max != 0){
                    for ($i=$req->size_min; $i <=$req->size_max; $i++) {
                        $req->merge(['size'=> $i]);
                        ProductDetail::create($req->all());  
                    }
                    return redirect()->route('admin.product')->with('success','Thêm thuộc tính sản phẩm '.$req->name.' thành công!');
                }
            }
    }

    public function add_image($id){
        $pros = Product::find($id);
        $pro = Product::Where('id',$id)->first();
        $pro_image = ProductImage::where('product_id',$id)->get();
        return view('admin.product.add_image',[
            'pros' => $pros,
            'pro' => $pro,
            'pro_image'  => $pro_image
        ]);
    }
     public function post_add_image($id, Request $req){
        foreach($req->other_img as $other){
                    $other->move(base_path('resources/views/admin/product/uploads'),$other->getClientOriginalName());
                    $other_name = $other->getClientOriginalName();
                    $req->merge(['image' => $other_name ]);
                    ProductImage::create($req->all());
                }
                return redirect()->back()->with('success','Thêm ảnh sản phẩm '.$req->name.' thành công!');
    }

    public function edit($id, Request $req)
    {
        $pros = Product::find($id);
        $cats = Category::all();
        $brand = Brand::all();
        if ($req->isMethod('post')) {
            $req->offsetUnset('_token');
            $this->validate($req,[
            'name' => 'required',
            'listed_price' => 'required'
        ],[
            'name.required' => 'Tên sản phẩm không được để trống!!!',
            'listed_price.required' => 'Giá niên yết sản phẩm không được để trống!!!'
        ]);
            $pros = Product::find($id);
            $imge_ava = $pros->image_ava;
            if($req->hasFile('image_ava_check')){
                $file = $req->image_ava_check;
                $file->move(base_path('resources/views/admin/product/uploads'),$file->getClientOriginalName());
                $imge_ava = $file->getClientOriginalName();
            }
           $req->merge(['image_ava' => $imge_ava ]);

            if ($pros->update($req->all())) {
                return redirect()->route('admin.product')->with('success','Sửa thông tin sản phẩm '.$req->name.' thành công!');
            }else{
                 return redirect()->back()->with('error','Sửa thông tin sản phẩm '.$req->name.' không thành công!');
            }

            }
            return view('admin.product.edit',['pros' => $pros,'cats' =>$cats, 'brand' => $brand]);
    }


    public function delete($id){
        $pros = Product::find($id);
        $pro = Product::where('id',$id)->delete();
        if($pro){
            return redirect()->back()->with('success','Xóa sản phẩm '.$pros->name.' thành công!');
        }else{
            return redirect()->back()->with('error','xóa sản phẩm '.$pros->name.' thất bại!');
        }
    }

    public function edit_detail($id,$id_detail, Request $req)
    {
        $pros = Product::find($id);
        $cats = Category::all(); 
        $brand = Brand::all(); 
        $pros_detail = ProductDetail::find($id_detail);
        return view('admin.product.edit_detail',['pros' => $pros,'cats' =>$cats, 'brand' => $brand,'pros_detail' => $pros_detail]);
    }

    public function post_edit_detail($id,$id_detail, Request $req)
    {
        $pros = Product::find($id);
        $cats = Category::all(); 
        $brand = Brand::all(); 
        $pros_detail = ProductDetail::find($id_detail);
        $req->offsetUnset('_token');
            $this->validate($req,[
            'price' => 'required',
            'color' => 'required',
            'amount' => 'required',
            'content' => 'required'
        ],[
            'price.required' => 'Giá sản phẩm không được để trống!!!',
            'content.required' => 'Mô tả sản phẩm không được để trống!!!',
            'color.required' => 'Màu sắc sản phẩm không được để trống!!!',
            'amount.required' => 'Số lượng sản phẩm không được để trống!!!'
        ]);
            $imge = $pros_detail->image;
            if($req->hasFile('image_pro')){
                $file = $req->image_pro;
                $file->move(base_path('resources/views/admin/product/uploads'),$file->getClientOriginalName());
                $imge = $file->getClientOriginalName();
            }
            $req->merge(['image' => $imge, 'product_id' => $id]);

            if ($pros_detail->update($req->all())) {
                return redirect()->route('admin.product')->with('success','Sửa thông tin thuộc tính sản phẩm '.$pros->name.' thành công!');
            }else{
                 return redirect()->back()->with('error','Sửa thông tin thuộc tính sản phẩm '.$pros->name.' không thành công!');
            }
    }

    public function delete_detail($id){
        $pros_detail = ProductDetail::find($id);
        $pro_detail = ProductDetail::where('id',$id)->delete();
        if($pro_detail){
            return redirect()->back()->with('success','Xóa thuộc tính sản phẩm thành công!');
        }else{
            return redirect()->back()->with('error','xóa thuộc tính sản phẩm thất bại!');
        }
    }

    public function delete_image($id){
        $pros_image = ProductImage::find($id);
        $pro_image = ProductImage::where('id',$id)->delete();
        if($pro_image){
            return redirect()->back()->with('success','Xóa ảnh sản phẩm thành công!');
        }else{
            return redirect()->back()->with('error','xóa ảnh sản phẩm thất bại!');
        }
    }
}
?>