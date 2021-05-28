<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::where('deleted',1)->paginate('10');
        return view('Backend.product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('deleted',1)->get();
        return view('Backend.product.add',compact('category'));
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
            'name'   => 'required|unique:menu,name',
            'price'  => 'required|numeric|min:0',
            'sale'   => 'numeric|min:0|max:100',
            'cat_id' => 'required',
            'image'  => 'required'
        ],[
            'name.required'   => 'Yêu cầu nhập tên sản phẩm.',
            'name.unique'     => 'Sản phẩm này đã được tạo rồi.',
            'price.required'  => 'Vui lòng nhập vào giá sản phẩm.',
            'price.numeric'   => 'Vui lòng chỉ nhập vào chữ số.',
            'price.min'       => 'Giá sản phẩm không thể nhỏ hơn 0.',
            'sale.numeric'    => 'Vui lòng chỉ nhập vào chữ số.',
            'sale.min'        => 'Khuyến mãi tối thiểu không nhỏ hơn 0%.',
            'sale.max'        => 'Khuyến mãi tối đa 100%',
            'cat_id.required' => 'Vui lòng xác định danh mục.',
            'image.required'  => 'Vui lòng chọn ảnh cho sản phẩm'
        ]);
        $request->offsetUnset('_token');
        $img = str_replace(url('public/images/products').'/', '', $request->image);
        $request->merge(['image' => $img]);
        Product::create($request->all());
        return back()->with('success','Thêm sản phẩm thành công.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        if (!empty($product) && $product->deleted == 1) {
            $images = json_decode($product->image_list);
            return view('Backend.product.show',compact('product','images'));
        }else{
            return back()->with('error','Không có sản phẩm này.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        if (!empty($product) && $product->deleted == 1) {
            $category = Category::where('deleted',1)->get(); 
            $images   = json_decode($product->image_list);
            return view('Backend.product.edit',compact('product','images','category'));
        }else{
            return back()->with('error','Không có sản phẩm này.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'   => 'required',
            'price'  => 'required|numeric|min:0',
            'sale'   => 'numeric|min:0|max:100',
            'cat_id' => 'required',
            'image'  => 'required'
        ],[
            'name.required'   => 'Yêu cầu nhập tên sản phẩm.',
            'name.unique'     => 'Sản phẩm này đã được tạo rồi.',
            'price.required'  => 'Vui lòng nhập vào giá sản phẩm.',
            'price.numeric'   => 'Vui lòng chỉ nhập vào chữ số.',
            'price.min'       => 'Giá sản phẩm không thể nhỏ hơn 0.',
            'sale.numeric'    => 'Vui lòng chỉ nhập vào chữ số.',
            'sale.min'        => 'Khuyến mãi tối thiểu không nhỏ hơn 0%.',
            'sale.max'        => 'Khuyến mãi tối đa 100%',
            'cat_id.required' => 'Vui lòng xác định danh mục.',
            'image.required'  => 'Vui lòng chọn ảnh cho sản phẩm'
        ]);

        $request->offsetUnset('_token');
        $request->offsetUnset('_method');
        $update = Product::find($id);
        if ($update->name != $request->name) {
            $this->validate($request,[
                'name'   => 'unique:menu,name',
            ],[
                'name.unique'     => 'Sản phẩm này đã được tạo rồi.',
            ]);
        }else{
            $request->offsetUnset('name');
        }
        if ($request->image != $update->image) {
           $img = str_replace(url('public/images/products').'/', '', $request->image);
           $request->merge(['image' => $img]);
       }
       Product::find($id)->update($request->all());
       return back()->with('success','Cập nhật sản phẩm thành công.');
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if (!empty($product) && $product->deleted == 1) {
            Product::find($id)->update(['deleted' => 0]);
            return back()->with('success','Một sản phẩm đã bị xóa khỏi danh sách.');
        }else{
            return back()->with('error','Không có sản phẩm này.');
        }
    }
}
