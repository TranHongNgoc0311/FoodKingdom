<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});
//Quên mật khẩu
Route::group(['prefix' => 'reset-password','middleware' => 'web'],function (){
	Route::get('/','CustomerController@ForgotPassword')->name('forgot_password');
	Route::post('/', 'CustomerController@sendMail')->name('send_token');
	Route::post('/{token}', 'CustomerController@UpdatePassword')->name('update_password');
	Route::get('/{token}', 'CustomerController@reset')->name('reset_password');
});