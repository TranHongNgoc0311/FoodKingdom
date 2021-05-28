<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::where('deleted',1)->paginate(10);
        return view('Backend.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:category,name|min:3'
        ],[
            'name.required' => 'Vui lòng nhập vào tên danh mục.',
            'name.unique'   => 'Danh mục này đã tồn tại.',
            'name.min'      => 'Tên danh mục quá ngắn. Tối thiểu là 3 ký tự!'
        ]);
        $request->offsetUnset('_token');
        Category::create($request->all());
        return back()->with('success','Một danh mục đã được thêm vào.');
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:category,name|min:3',
            'id'   => 'required'
        ],[
            'id.required'   => 'Vui lòng chọn danh mục cần chỉnh sửa.',
            'name.required' => 'Vui lòng nhập vào tên danh mục.',
            'name.unique'   => 'Danh mục này đã tồn tại.',
            'name.min'      => 'Tên danh mục quá ngắn. Tối thiểu là 3 ký tự!'
        ]);
        $request->offsetUnset('_toke');
        $request->offsetUnset('_method');
        Category::find($request->id)->update($request->all());
        return back()->with('success','Chỉnh sửa danh mục thành công.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->update(['deleted' => 0]);
        return back()->with('success','Xóa thành công. Một danh mục đã bị xóa.');
    }
}
