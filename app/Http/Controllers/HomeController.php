<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $menu     = Product::where('deleted',1)->orderBy('created_at','desc')->get();
        $category = Category::where('deleted',1)->get();
        $blog     = Blog::where('deleted',1)->orderBy('updated_at','desc')->limit(3)->get();
        return view('Frontend.index',compact('menu','category','blog'));
    }

    public function contact()
    {
        return view('Frontend.contact');
    }

    public function about()
    {
        return view('Frontend.about');
    }
}
