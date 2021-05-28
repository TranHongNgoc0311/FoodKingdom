<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Comments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::where(['status' => 1,'deleted' => 1])->get();
        return view('Backend.blog.comments.index',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comments = Comments::where('blog_id',$id)->orderBy('status')->get();
        return view('Backend.blog.comments.show',compact('comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Comments::find($id)->update(['status' => 1]);
        return back()->with('success','Đã phê duyệt bình luận. Từ giờ bình luận sẽ được hiển thị.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Comments::find($id)->update(['status' => 0]);
        return back()->with('success','Đã phê duyệt bình luận. Từ giờ bình luận sẽ được hiển thị.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comments::find($id)->delete();
        return back()->with('success','Bình luận đã bị xóa.');
    }
}
