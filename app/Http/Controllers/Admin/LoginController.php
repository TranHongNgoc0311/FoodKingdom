<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
        if(!empty(Auth::user())){
            return redirect()->route('index');
        }else{
            return view('Backend.login');
        }
    }

    public function login(Request $request)
    {
        $this->validate($request,[
            'code'     => 'required',
            'password' => 'required'
        ],[
            'code.required'     => 'Vui lòng nhập mã ID.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
        ]);   
        if (Auth::attempt($request->only('code','password'),$request->has('remember-me'))) {
           return redirect()->route('dashboard');
       }
        return back()->with('error','code hoặc password sai!');
   }

   public function logout()
   {
    Auth::logout();
    return redirect()->route('login.index');
}
}
