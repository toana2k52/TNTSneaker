<?php 
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ProductImage;
use App\Models\Category;
use App\Models\Brand;
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
    	$pro_all = Product::paginate(9);
        if ($req->search_pro) {
            $pro_all = Product::where('name','like','%'.$req->search_pro.'%')->paginate(9);
        }
        return view('user.product.all-product',[
            'pro_all' => $pro_all,
            'check' => 'yes'
        ]);
    }

    public function product_detail($slug,$id, Request $req)
    {
        $pros = Product::where('slug',$slug)->first();
        $pros_lq = Product::where('category_id',$pros->category_id)->get();
        $pros_min = ProductDetail::where('product_id',$pros->id)->min('size');
        $pros_detail = ProductDetail::where('product_id',$pros->id)->where('size',$pros_min)->first();
        $pros_image = ProductImage::where('product_id',$pros->id)->get();
        return view('user.product.product_detail',[
           'pros' => $pros,
           'pros_lq' => $pros_lq,
           'pros_detail' => $pros_detail,
           'pros_image' => $pros_image
        ]);
    }
    public function new(Request $req)
    {
        $pro_new = Product::orderBy('created_at', 'desc')->paginate(9);
        if ($req->search_pro) {
            $pro_new = Product::where('name','like','%'.$req->search_pro.'%')->paginate(9);
        }
        return view('user.product.search-product',[
            'pro_search' => $pro_new,
            'key' => 2
        ]);
        return view('user.product.all-product');
    }
    public function sale(Request $req)
    {
        $pro_sale = Product::whereColumn('listed_price_sale','<>','listed_price')->paginate(9);
        if ($req->search_pro) {
            $pro_sale = Product::where('name','like','%'.$req->search_pro.'%')->paginate(9);
        }
        return view('user.product.search-product',[
            'pro_search' => $pro_sale,
            'key' => 3
        ]);
        return view('user.product.all-product');
    }
    public function search_price( Request $req)
    {
        $pro_price = Product::Where('listed_price_sale','>=', $req->min)->Where('listed_price_sale','<=', $req->max)->paginate(9);
        if ($req->search_pro) {
            $pro_price = Product::where('name','like','%'.$req->search_pro.'%')->paginate(9);
        }
        return view('user.product.search-product',[
            'pro_search' => $pro_price,
            'key' => 4
        ]);
    }
    public function search( Request $req)
    {
        $pro_all = Product::paginate(9);
        if ($req->search_pro) {
            $pro_all = Product::where('name','like','%'.$req->search_pro.'%')->paginate(9);
            $check=1;
            $search_pro = $req->search_pro;
        }
        else{
            $search_pro = '';
        }
        return view('user.product.all-product',[
            'pro_all' => $pro_all,
            'check' => $check,
            'search_pro' => $search_pro
        ]);
    }

    public function search_category($slug, Request $req)
    {
        $cat = Category::where('slug',$slug)->first();
        // if($cat->parent == 0){
        //     $pro_ids = Category::where('parent',$cat->id)->get();
        //     $id_cat = [];
        //     foreach ($pro_ids as $key => $pro_id) {
        //         $id_cat = $id_cat = $pro_id->id;
        //         echo $id_cat;
        //         die;
        //         $pro_cats = Product::where('category_id',$id_cat)->paginate(9);
        //     }
        //     echo $pro_cats;
        //         die;
            
        // }else{
            $pro_cats = Product::where('category_id',$cat->id)->paginate(9);
        // } 
        if ($req->search_pro) {
            $pro_cats = Product::where('name','like','%'.$req->search_pro.'%')->paginate(9);
        }
        return view('user.product.search-product',[
            'pro_search' => $pro_cats,
            'search' => $cat->name,
            'parent' => $cat->parent,
            'key' => 0
        ]);
    }

    public function search_brand($name, Request $req)
    {
        $brand = Brand::where('name',$name)->first();
        $pro_brands = Product::where('brand_id',$brand->id)->paginate(9);
        if ($req->search_pro) {
            $pro_brands = Product::where('name','like','%'.$req->search_pro.'%')->paginate(9);
        }
        return view('user.product.search-product',[
            'pro_search' => $pro_brands,
            'search' => $brand->name,
            'key' => 1
        ]);
    }
    // public function getProduct($id) {
    //     $cateIds = Category::select('id')->where('parent', $id)->get();
    //     if (!count($cateIds)) {
    //         $cateIds[] = $id;
    //     }

    //     $product = Product::select('id', 'name', 'images', 'slug', 'brand_id', 'cat')->whereIn('cate_id', $cateIds)->get();
    // }
}
?>