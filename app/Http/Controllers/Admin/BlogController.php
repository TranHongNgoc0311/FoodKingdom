<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Tag;
use App\Models\Blog;
use App\Models\Blog_tag;
use App\Models\Blog_editer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::where('deleted',1)->orderBy('status')->get();
        return view('Backend.blog.index',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag = Tag::where('deleted',1)->get();
        $blog = Blog::first();
        return view('Backend.blog.add',compact('tag','blog'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->offsetUnset('_token');
        $this->validate($request,[
            'title'   => 'required|unique:blog,title',
            'content' => 'required',
            'image'   => 'required',
            'tag_id'  => 'required'
        ],[
            'title.required'   => 'Vui lòng viết tiêu đề cho Blog.',
            'title.unique'     => 'Blog này đã tồn tại rồi.',
            'content.required' => 'Hãy viết nội dung trước khi đăng',
            'image.required'   => 'Vui lòng chọn hình minh họa',
            'tag_id.required'  => 'Vui lòng chọn thẻ Tag'
        ]);
        $img = str_replace(url('public/images/blog').'/', '', $request->image);
        $request->merge(['image' => $img]);
        $request->merge(['writer' => Auth::user()->id]);
        $request->merge(['status' => 0]);
        Blog::create($request->all());
        $blog = Blog::where('title',$request->title)->first();
        foreach ($request->tag_id as $t) {
            Blog_tag::create(['blog_id' => $blog->id, 'tag_id' => $t]);
        }
        return back()->with('success','Blog đã được lưu thành công. Bài viết sẽ được đăng sau khi được edit.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        return view('Backend.blog.show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag  = Tag::where('deleted',1)->get();
        $blog = Blog::find($id);
        return view('Backend.blog.edit',compact('tag','blog'));
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
        $request->offsetUnset('_method');
        $request->offsetUnset('_token');
        $this->validate($request,[
            'title'   => 'required',
            'content' => 'required',
            'image'   => 'required',
            'tag_id'  => 'required'
        ],[
            'title.required'   => 'Vui lòng viết tiêu đề cho Blog.',
            'content.required' => 'Hãy viết nội dung trước khi đăng',
            'image.required'   => 'Vui lòng chọn hình minh họa',
            'tag_id.required'  => 'Vui lòng chọn thẻ Tag'
        ]);
        $blog = Blog::find($id);
        if ($request->title != $blog->title) {
            $this->validate($request,[
                'title'   => 'unique:blog,title'
            ],[
                'title.unique'     => 'Blog này đã tồn tại rồi.',
            ]);
        }
        $img = str_replace(url('public/images/blog').'/', '', $request->image);
        $request->merge(['image' => $img]);
        $request->merge(['writer' => Auth::user()->id]);
        Blog::find($id)->update($request->all());
        Blog_tag::where('blog_id',$blog->id)->delete();
        foreach ($request->tag_id as $t) {
            Blog_tag::create(['blog_id' => $blog->id, 'tag_id' => $t]);
        }
        $editer = Blog_editer::where(['blog_id' => $id, 'editer' => Auth::user()->id])->first();
        if (empty($editer)) {
            Blog_editer::create(['blog_id' => $id, 'editer' => Auth::user()->id]);
        }
        return back()->with('success','Cập nhật blog thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog_editer::where('blog_id',$id)->delete();
        Blog_tag::where('blog_id',$id)->delete();
        Blog::find($id)->delete();
        return redirect()->route('Blog.index')->with('success','Blog đã bị xóa.');
    }
}
