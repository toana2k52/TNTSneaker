<?php 
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
/**
 * q``
 */
class AboutController extends Controller
{
    /**
     * summary
     */
    public function index()
    {
    	/**
		* Trong thư mục resources/views/ tạo thư mục admin 
		* Trong resources/views/admin tạo file index.blade.php
    	*/
        return view('user.about.index');
    }

}
?>