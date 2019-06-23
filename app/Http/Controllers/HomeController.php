<?php 
namespace App\Http\Controllers;

/**
 * summary
 */
class HomeController extends Controller
{
    /**
     * summary
     */
    public function index()
    {
        // goi view
        return view('home');
    }

    public function about(){
       return view('about');
    }
}
?>