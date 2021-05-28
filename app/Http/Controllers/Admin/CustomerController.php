<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::where('deleted',1)->paginate(10);
        return view('Backend.customers.index',compact('customers'));
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
        $customer = Customer::find($id);
        return view('Backend.customers.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    public function ban()
    {
        $customers = Customer::where('deleted',0)->paginate(10);
        return view('Backend.customers.ban',compact('customers'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Customer::find($id);
        if (!$destroy) {
            return back();
        }else{
            $destroy->delete();
        }
        return redirect()->route('customer.index')->with('success','Một tài khoản đã bị xóa');
    }
    
    public function BanControl($id,$ban)
    {
        $customer = Customer::find($id);
        if (!$customer) {
            return back();
        }else{
            $customer->update(['deleted' => $ban]);
        }
        $message = ($ban == 1)?'Tài khoản đã được khôi phục':'Một tài khoản đã bị ban';

        return redirect()->back()->with('success',$message);
    }
}
