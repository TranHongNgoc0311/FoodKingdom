<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Order;
use App\Models\Service;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show($id)
    {
        $order = Order::find($id);
        $total_price = $this->TotalPrice($order);
        return view('Frontend.order.show',compact('order','total_price'));
    }

    public function TotalPrice($order)
    {
        $result = 0;
        $service_price = $order->service->price * $order->service->sale / 100;
        $type_price = ($order->service_type == 1)? '15000':'';
        foreach ($order->details as $details) {
            $product_price = $details->menu->price - $details->menu->price * $details->menu->sale / 100;
            $result += $product_price * $order->table_count;
        }
        return $result + $service_price + $type_price;
    }

    public function delete($id)
    {
        # code...
    }
    public function add($slug)
    {
        $service = Service::where('slug',$slug)->first();
        return view('Frontend.order.create',compact('service'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'first_name'   => 'required',
            'last_name'    => 'required',
            'product_id'   => 'required',
            'email'        => 'required|email|regex:/^[a-z][a-z0-9_\]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/',
            'phone'        => 'required|string|min:9|max:25',
            'address'      => 'required'
        ],[
            'first_name.required'    => 'Vui lòng nhập vào họ của bạn.',
            'last_name.required'     => 'Vui lòng nhập vào tên của bạn.',
            'product_id.required'    => 'Vui lòng chọn món ăn bạn thích trong menu.',
            'address.required'       => 'Vui lòng nhập vào địa chỉ nhà của bạn.',
            'phone.required'         => 'Vui lòng nhập vào số điện thoại của bạn.',
            'phone.max'              => 'Số điện thoại tối đa 25 chữ số.',
            'phone.min'              => 'Số điện thoại tối thiểu 9 chữ số.',
            'email.email'            => 'Email không hợp lệ.',
            'email.required'         => 'Vui lòng nhập vào email của bạn.',
            'email.regex'            => 'Định dạng email không đúng.',
        ]);
        $service = Service::find($request->id);
        $customer = '';
        if (Auth::guard('customer')->check()) {
            $customer = Auth::guard('customer')->user()->id;
        }
        if ($service->type == 1) {
            $this->validate($request,[
                'service_type' => 'required',
            ],[
                'service_type.required'  => 'Vui lòng chọn kiểu dịch vụ bạn muốn.'
            ]);
        }
        $this->validate($request,[
            'table_count'  => 'required|numeric|min:1'
        ],[
            'table_count.required' => 'Vui lòng xác định số bàn hoặc suất ăn.',
            'table_count.min' => 'Tối thiểu 1 bàn (suất).',
        ]);
        if ($request->service_type == 2) {
            $this->validate($request,[
                'table_count'  => 'max:50'
            ],[
                'table_count.max' => 'Tối đa 50 bàn (suất).'
            ]);
        }
        $id = $this->get_id();
        Order::create([
            'id'           => $id,
            'customer_id'  => $customer,
            'first_name'   => $request->first_name,
            'last_name'    => $request->last_name,
            'service_type' => $request->service_type,
            'service_id'   => $request->id,
            'table_count'  => $request->table_count,
            'address'      => $request->address,
            'email'        => $request->email,
            'phone'        => $request->phone
        ]);
        foreach ($request->product_id as $product_id) {
            OrderDetail::create([
                'order_id'   => $id,
                'product_id' => $product_id
            ]);
        }
        return back()->with('message','Đơn đặt dịch vụ tạo thành công. Vui lòng chờ ban quản lý liên hệ lại để nhận thêm tư vấn.');
    }

    private function get_id(){    
        do
        {
            $id = $this->make_id(rand(4,7)).time();
            $order = Order::find($id);
        }
        while(!empty($order));
        return $id;
    }

    private function make_id($length){    
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= strtolower($codeAlphabet);

        for($i=0;$i<$length;$i++){
            $token .= $codeAlphabet[mt_rand(0,strlen($codeAlphabet)-1)];
        }
        return $token;
    }
}
