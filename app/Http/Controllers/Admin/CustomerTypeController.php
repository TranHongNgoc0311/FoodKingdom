<?php

namespace App\Http\Controllers\Admin;

use App\Models\CustomerType;
use App\Models\CustomerHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type = CustomerType::get();
        return view('Backend.customers.type.index',compact('type'));
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
        if (empty($request->sale_percent)) {
            $request->sale_percent = 0;
        }
        $this->validate($request,[
            'name'         => 'required|unique:customer_type,name',
            'sale_percent' => 'numeric|min:0|max:100',
        ],[
            'name.required'   => 'Yêu cầu nhập tên loại khách hàng.',
            'name.unique'     => 'Loại khách hàng này đã có rồi.',
            'sale_percent.numeric'    => 'Vui lòng chỉ nhập vào chữ số.',
            'sale_percent.min'        => 'Khuyến mãi tối thiểu không nhỏ hơn 0%.',
            'sale_percent.max'        => 'Khuyến mãi tối đa 100%',
        ]);
        CustomerType::create($request->except('_token'));
        return back()->with('success','Thêm loại khách hàng thành công.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $type = CustomerType::find($id);
     return view('Backend.customers.type.edit',compact('type'));
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
        $type = CustomerType::find($id);
        if (empty($request->sale_percent)) {
            $request->sale_percent = 0;
        }
        $this->validate($request,[
            'name'         => 'required',
            'sale_percent' => 'numeric|min:0|max:100',
        ],[
            'name.required'   => 'Yêu cầu nhập tên loại khách hàng.',
            'sale_percent.numeric'    => 'Vui lòng chỉ nhập vào chữ số.',
            'sale_percent.min'        => 'Khuyến mãi tối thiểu không nhỏ hơn 0%.',
            'sale_percent.max'        => 'Khuyến mãi tối đa 100%',
        ]);
        if ($type->name != $request->name) {
            $this->validate($request,[
                'name'         => 'unique:customer_type,name'
            ],[
                'name.unique'     => 'Loại khách hàng này đã có rồi.',
            ]);
        }
        $type->update($request->except('_token','method'));
        return back()->with('success','Đã cập nhật dữ liệu loại khách hàng.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CustomerType::find($id)->delete();
        return back()->with('success','Dữ liệu loại khách hàng đã bị xóa bỏ.');
    }
}
