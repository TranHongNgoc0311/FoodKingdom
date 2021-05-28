<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use App\Models\Product;
use App\Models\Service_menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::where('deleted',1)->paginate(10);
        return view('Backend.service.index',compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::where('deleted',1)->get();
        return view('Backend.service.add',compact('product'));
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
            'name'       => 'required|unique:menu,name',
            'price'      => 'required|numeric|min:0',
            'product_id' => 'required',
            'sale'       => 'numeric|min:0|max:100'
        ],[
            'product_id.required' => 'Yêu cầu nhập tên sản phẩm.',
            'name.required'       => 'Yêu cầu nhập tên sản phẩm.',
            'name.unique'         => 'Sản phẩm này đã được tạo rồi.',
            'price.required'      => 'Vui lòng nhập vào giá sản phẩm.',
            'price.numeric'       => 'Vui lòng chỉ nhập vào chữ số.',
            'price.min'           => 'Giá sản phẩm không thể nhỏ hơn 0.',
            'sale.numeric'        => 'Vui lòng chỉ nhập vào chữ số.',
            'sale.min'            => 'Khuyến mãi tối thiểu không nhỏ hơn 0%.',
            'sale.max'            => 'Khuyến mãi tối đa 100%'
        ]);
        $img = str_replace(url('public/images/service').'/', '', $request->image);
        $request->merge(['image' => $img]);
        $request->offsetUnset('_token');
        Service::create($request->only('name','slug','price','image','status','description','sale'));
        $service_id = Service::where('name',$request->name)->first();
        foreach($request->product_id as $pro_id){
            Service_menu::create(['product_id' => $pro_id, 'service_id' => $service_id->id]);
        }
        return back()->with('success','Dịch vụ được tạo thành công.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);
        if (!empty($service)) {
            return view('Backend.service.show',compact('service'));
        }else{
            return back()->with('error','Không có dịch vụ này.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        $product = Product::where('deleted',1)->get();
        return view('Backend.service.edit',compact('product','service'));
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
        'name'       => 'required',
        'price'      => 'required|numeric|min:0',
        'product_id' => 'required',
        'sale'       => 'numeric|min:0|max:100'
    ],[
        'product_id.required' => 'Vui lòng chọn sản phẩm cho dịch vụ.',
        'name.required'       => 'Yêu cầu nhập tên dịch vụ.',
        'price.required'      => 'Vui lòng nhập vào giá dịch vụ.',
        'price.numeric'       => 'Vui lòng chỉ nhập vào chữ số.',
        'price.min'           => 'Giá dịch vụ không thể nhỏ hơn 0.',
        'sale.numeric'        => 'Vui lòng chỉ nhập vào chữ số.',
        'sale.min'            => 'Khuyến mãi tối thiểu không nhỏ hơn 0%.',
        'sale.max'            => 'Khuyến mãi tối đa 100%'
    ]);
     $request->offsetUnset('_token');
     $request->offsetUnset('_method');
     $update = Service::find($id);
     if ($update->name != $request->name) {
        $this->validate($request,[
            'name'   => 'unique:menu,name',
        ],[
            'name.unique'     => 'Dịch vụ này đã được tạo rồi.',
        ]);
    }else{
        $request->offsetUnset('name');
    }
    $img = str_replace(url('public/images/service').'/', '', $request->image);
    $request->merge(['image' => $img]);
    Service_menu::where('service_id',$id)->delete();
    foreach($request->product_id as $pro_id){
        Service_menu::create(['product_id' => $pro_id, 'service_id' => $update->id]);
    }
    $request->offsetUnset('product_id');
    Service::find($id)->update($request->all());
    return back()->with('success','Dịch vụ được tạo thành công.');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        if (!empty($service)) {
            Service::find($id)->update(['deleted' => 0]);
            return back()->with('success','Xóa dịch vụ thành công.');
        }else{
            return back()->with('error','Không có dịch vụ này.');
        }
    }
}
