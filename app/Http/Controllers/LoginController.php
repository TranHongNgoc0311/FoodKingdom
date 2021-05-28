<?php

namespace App\Http\Controllers;

use Auth;
use Socialite;
use App\Models\Customer;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('customer')->check()) {
            return redirect()->route('home');
        }else{
            return view('Frontend.login');
        }
    }

    public function login(Request $request)
    {
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required|min:8'
        ],[
            'username.required' => 'Vui lòng nhập vào tên đăng nhập.',
            'password.required' => 'Vui lòng nhập vào mật khẩu.',
            'password.min'      => 'Mật khẩu ít nhất phải 8 ký tự.'
        ]);
        if (Auth::guard('customer')->attempt($request->only('username','password'),$request->has('keep_login'))) {
            return redirect()->route('home')->with('login_success','Đăng nhập thành công');
        }else{
            return back()->with('error','username hoặc password sai!');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        return back();
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    public function handleProviderCallback($provider)
    {
        $info = Socialite::driver($provider)->user();
        $user = $this->create($info,$provider);
        Auth::guard('customer')->login($user);
        return redirect()->route('home')->with('login_success','Đăng nhập thành công');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($info,$provider)
    {
        $user = Customer::where('provider_id',$info->id)->first();
        if (!$user) {
            Customer::create([
                'last_name'   => $info->name,
                'email'       => $info->email,
                'provider_id' => $info->id,
                'provider'    => $provider 
            ]);
        }
        return $user;
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
