<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tag = Tag::where('deleted',1)->orderBy('created_at')->get();
        return view('Backend.blog.tag.index',compact('tag'));
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
        $this->validate($request,[
            'name' => 'required|unique:tag,name'
        ],[
            'name.required' => 'Vui lòng điền vào tên thẻ.',
            'name.unique'   => 'Thẻ Tag này đã tồn tại rồi.'
        ]);
        $request->offsetUnset('_token');
        Tag::create($request->all());
        return back()->with('success','Một thẻ tag được tạo thành công');
    }

    public function delete(Request $request)
    {
        if (!empty($request->id)) {
            foreach ($request->id as $id) {
                Tag::find($id)->update(['deleted' => 0]);
            }
            return back()->with('success','Xóa thẻ Tag thành công.');
        }else{
            return redirect()->route('Tag.index')->with('error','Vui lòng chọn thẻ Tag bạn muốn xóa.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('Backend.blog.tag.edit',compact('tag'));
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
        $this->validate($request,[
            'name' => 'required'
        ],[
            'name.required' => 'Vui lòng điền vào tên thẻ.'
        ]);
        $tag = Tag::find($id);
        if ($request->name != $tag->name) {
            $this->validate($request,[
                'name' => 'unique:tag,name'
            ],[
                'name.unique'   => 'Thẻ Tag này đã tồn tại rồi.'
            ]);
        }
        $request->offsetUnset('_token');
        Tag::find($id)->update($request->all());
        return redirect()->route('Tag.edit',['id' => $tag->id])->with('success','Cập nhật thẻ Tag thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
