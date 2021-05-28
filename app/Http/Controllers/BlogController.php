<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comments;
use Illuminate\Http\Request;

class BlogController extends Controller
{
	public function index()
	{
		$blog = Blog::where(['status' => 1,'deleted' => 1])->get();
		return view('Frontend.blog',compact('blog'));
	}

	public function show(Request $request,$slug)
	{
		$blog = Blog::where('slug',$slug)->first();
		$active = $request->session()->get('active');
		if (!$active) {
			$request->session()->put('active',1);
			$blog->increment('view');
		}
		$comments = Comments::where(['blog_id' => $blog->id,'status' => 1])->get();
		return view('Frontend.blog_view',compact('blog','comments'));
	}
}
