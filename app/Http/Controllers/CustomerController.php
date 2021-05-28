<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Order;
use App\Models\PasswordReset;
use App\Notifications\ForgotPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('customer')->check()) {
            $customer = Auth::guard('customer')->user();
            return view('Frontend.customer.index',compact('customer'));
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('Frontend.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('agree-term')) {
            $this->validate($request,[
                'username'  => 'required|unique:customer,username',
                'first_name'=> 'required',
                'last_name' => 'required',
                'birth'     => 'required',
                'email'     => 'email|required|regex:/^[a-z][a-z0-9_\]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/|unique:customer,email',
                'phone'     => 'required|string|min:9|max:25',
                'address'   => 'required',
                'password'  => 'required|min:8|confirmed',
                'password_confirmation' => 'required'
            ],[
                'birth.required'      => 'Vui lòng nhập vào ngày sinh của bạn.',
                'password.required'   => 'Vui lòng nhập vào mật khẩu.',
                'password.confirmed'  => 'Mật khẩu xác minh không khớp.',
                'password_confirmation.required'   => 'Vui lòng nhập lại mật khẩu.',
                'password.min'        => 'Mật khẩu tối thiểu phải 8 ký tự.',
                'username.required'   => 'Vui lòng nhập tên người dùng.',
                'username.unique'     => 'Xin lỗi, tên người dùng đã tồn tại.',
                'first_name.required' => 'Vui lòng nhập vào họ của bạn.',
                'last_name.required'  => 'Vui lòng nhập vào tên của bạn.',
                'address.required'    => 'Vui lòng nhập vào địa chỉ nhà của bạn.',
                'phone.required'      => 'Vui lòng nhập vào số điện thoại của bạn.',
                'phone.max'           => 'Số điện thoại tối đa 25 chữ số.',
                'phone.min'           => 'Số điện thoại tối thiểu 9 chữ số.',
                'email.email'         => 'Email không hợp lệ.',
                'email.required'      => 'Vui lòng nhập vào email của bạn.',
                'email.regex'         => 'Định dạng email không đúng.',
                'username.unique'     => 'Xin lỗi, tên người dùng đã tồn tại.',
                'email.unique'        => 'Xin lỗi, email dùng đã tồn tại.'
            ]);
            $request->merge(['password' => bcrypt($request->password)]);
            $request->merge(['birth' => date('Y-m-d',strtotime($request->birth))]);
            Customer::create($request->except('_token','agree-term'));
            return view('Frontend.notification')->with('message','Một mail đã được gửi vào tài khoản của bạn. Vui lòng kiểm tra hòm thư và tiến hành active tài khoản.');
        }else{
            return back()->with('alert','Vui lòng đồng ý với các điều khoản và dịch vụ nhà hàng.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ForgotPassword()
    {
        return view('Frontend.reset_password');
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

    public function password_change()
    {
        return view('Frontend.change_password');
    }

    public function verify(Request $request){
        $this->validate($request,[
            'verify'  => 'required'
        ],[
            'verify.required'   => 'Vui lòng nhập vào mật khẩu.'
        ]);
        if (Hash::check($request->verify,Auth::guard('customer')->user()->password)) {
            $checked = $request->session()->get('checked');
            if (!$checked) {
                $request->session()->put('checked',1);
            }
            return redirect()->route('password_change');
        }else{
            return back()->with('verify','Mật khẩu của bạn không đúng');
        }
    }

    public function change(Request $request){
        $this->validate($request,[
            'password'  => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ],[
            'password.required'   => 'Vui lòng nhập vào mật khẩu.',
            'password.confirmed'  => 'Mật khẩu xác minh không khớp.',
            'password_confirmation.required'   => 'Vui lòng nhập lại mật khẩu.',
            'password.min'        => 'Mật khẩu tối thiểu phải 8 ký tự.'
        ]);
        $request->merge(['password' => bcrypt($request->password)]);
        Auth::guard('customer')->user()->update($request->only('password'));
        $request->session()->forget('checked');
        return redirect()->route('Customer.index')->with('success','Mật khẩu đổi thành công');
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
        $customer = Auth::guard('customer')->user();
        $this->validate($request,[
            'username'  => 'required',
            'first_name'=> 'required',
            'last_name' => 'required',
            'birth'     => 'required',
            'email'     => 'email|required|regex:/^[a-z][a-z0-9_\]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/',
            'phone'     => 'required|string|min:9|max:25',
            'address'   => 'required',
            'image'     => 'required|image|mimes:jpg,png,gif,jpeg|max:2048'
        ],[
            'birth.required'      => 'Vui lòng nhập vào ngày sinh của bạn.',
            'username.required'   => 'Vui lòng nhập tên người dùng.',
            'username.unique'     => 'Xin lỗi, tên người dùng đã tồn tại.',
            'first_name.required' => 'Vui lòng nhập vào họ của bạn.',
            'last_name.required'  => 'Vui lòng nhập vào tên của bạn.',
            'address.required'    => 'Vui lòng nhập vào địa chỉ nhà của bạn.',
            'phone.required'      => 'Vui lòng nhập vào số điện thoại của bạn.',
            'phone.max'           => 'Số điện thoại tối đa 25 chữ số.',
            'phone.min'           => 'Số điện thoại tối thiểu 9 chữ số.',
            'email.email'         => 'Email không hợp lệ.',
            'email.required'      => 'Vui lòng nhập vào email của bạn.',
            'email.regex'         => 'Định dạng email không đúng.',
            'image.required'     => 'Vui lòng chọn ảnh đại diện của bạn.',
            'image.image'        => 'Vui lòng chỉ chọn file ảnh.',
            'image.mimes'        => 'File ảnh phải có đuôi jpg,png,gif,jpeg.',
            'image.max'          => 'kích thước file quá lớn.',
        ]);
        $request->offsetUnset('_token');
        $request->offsetUnset('_method');
        //Upload ảnh đại diện
        $image = $request->file('image');
        $img_name = $request->username.'/'.$customer->username.'_'.time().'.'.$image->getClientOriginalExtension();
        $request->merge(['avatar' => $img_name]);
        $image->move(public_path('images/customers/'.$request->username), $img_name);
        //convert birth
        $request->merge(['birth' => date('Y-m-d',strtotime($request->birth))]);
        //Kiểm tra tên đăng nhập và email
        if ($customer->username != $request->username) {
            $this->validate($request,[
                'username'   => 'unique:customer,username'
            ],[
                'username.unique'     => 'Xin lỗi, tên người dùng đã tồn tại.'
            ]);
        }
        if ($customer->email != $request->email) {
            $this->validate($request,[
                'email'   => 'unique:customer,email'
            ],[
                'email.unique'     => 'Xin lỗi, email dùng đã tồn tại.'
            ]);
        }
        Customer::find($id)->update($request->except('image'));
        return back()->with('success','Cập nhật thông tin người dùng thành công.');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sendMail(Request $request)
    {
        $this->validate($request,[
            'email'     => 'email|required|regex:/^[a-z][a-z0-9_\]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/',
        ],[
            'email.email'         => 'Email không hợp lệ.',
            'email.required'      => 'Vui lòng nhập vào email của bạn.',
            'email.regex'         => 'Định dạng email không đúng.'
        ]);
        $user = Customer::where('email', $request->email)->first();
        if (!$user) {
            return back()->with('error','Email này không xác định.');
        }else{
            $passwordReset = PasswordReset::updateOrCreate([
                'email' => $user->email,
            ], [
                'token' => Str::random(60),
            ]);
            if ($passwordReset) {
                $user->notify(new ForgotPassword($passwordReset->token));
            }

            return redirect()->route('sign_in')->with('message','Hệ thống đã gửi 1 mail đến hòm thư của bạn. Vui lòng check mail!');
        }
    }

    public function reset(Request $request, $token)
    {
        $passwordReset = PasswordReset::where('token', $token)->first();
        
        if (empty($passwordReset)) {
            return redirect()->route('home');
        }else{
         if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();
            return view('Frontend.errors.422',['message' => 'Token này không hợp lệ!']);
        } 
        return view('Frontend.reset_password',compact('token'));
    }

}
public function UpdatePassword(Request $request,$token)
{
    $this->validate($request,[
        'password'  => 'required|min:8|confirmed',
        'password_confirmation' => 'required'
    ],[
        'password.required'   => 'Vui lòng nhập vào mật khẩu.',
        'password.confirmed'  => 'Mật khẩu xác minh không khớp.',
        'password_confirmation.required'   => 'Vui lòng nhập lại mật khẩu.',
        'password.min'        => 'Mật khẩu tối thiểu phải 8 ký tự.'
    ]);
    $PasswordReset = PasswordReset::where('token',$token)->first();
    $request->merge(['password' => bcrypt($request->password)]);
    Customer::where('email',$PasswordReset->email)->update($request->only('password'));
    $PasswordReset->delete();
    return redirect()->route('home')->with('success','Mật khẩu đổi thành công');
}
}
