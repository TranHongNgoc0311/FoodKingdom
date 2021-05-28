<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
    	$menu     = Product::where('deleted',1)->get();
    	$category = Category::where('deleted',1)->get();
    	return view('Frontend.menu',compact('menu','category'));
    }
}
