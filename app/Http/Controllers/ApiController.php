<?php 
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
/**
 * summary
 */
class ApiController extends Controller
{
    /**
     * summary
     */
    public function category($id)
    {
        $cat_ajax = Category::where('id',$id)->get();
        return  $cat_ajax;
    }
    public function category_edit(Request $req)
    {

        return Category::where('id',$req->get('id'))->update(
        [
            'name' => $req->get('name'),
            'parent' => $req->get('parent'),
            'status' => $req->get('status')
        ]);
           
    }









    public function product(Request $req)
    {
        $prod_ajax = Product::all();
        /*if ($req->search_pros) {
            $prod_ajax = Brand::where('name','like','%'.$req->search_pros.'%')->paginate();
        }*/
        return  $prod_ajax;
        
    }
}
?>