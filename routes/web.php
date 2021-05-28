<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/','HomeController@index')->name('home');
Route::get('contact','HomeController@contact')->name('contact');
Route::get('menu','MenuController@index')->name('menu');
Route::get('about','HomeController@about')->name('about');
Route::resource('service','ServiceController');
Route::resource('Sign-in','LoginController');
Route::post('Sign-in','LoginController@login')->name('sign_in');
Route::get('Sign-out','LoginController@logout')->name('sign_out');
Route::get('login/{provider}', 'LoginController@redirectToProvider')->name('social_login');
Route::get('login/{provider}/callback', 'LoginController@handleProviderCallback')->name('social_callback');
Route::resource('blog','BlogController');
Route::resource('Custom_comment','CommentsController');
Route::get('blog_view','BlogController@view')->name('blog_view');
Route::group(['prefix' => '/','middleware' => 'auth:customer'],function (){
	Route::resource('Customer','CustomerController');
	Route::get('Customer_/change-password','CustomerController@password_change')->name('password_change');
	Route::post('Customer_/change-password/verify','CustomerController@verify')->name('verify');
	Route::post('Customer_/change-password','CustomerController@change')->name('change');
	Route::group(['prefix' => 'Order'],function (){
		Route::get('{id}/show','OrderController@show')->name('Order.show');
		Route::get('{id}/delete','OrderController@delete')->name('Order.delete');
		Route::get('{slug}/add','OrderController@add')->name('Order.add');
		Route::post('store','OrderController@store')->name('Order.store');
	});
});

Route::group(['prefix' => 'FoodKingDom','namespace' => 'Admin'],function (){
	Route::resource('login','LoginController');
	Route::post('login','LoginController@login')->name('login');
	Route::group(['prefix' => '/','middleware' => 'auth_admin'],function (){
		Route::get('/','HomeController@index')->name('dashboard');
		Route::get('file','HomeController@file')->name('file');
		Route::resource('Category','CategoryController');
		Route::resource('customer','CustomerController');
		Route::get('customer_/Ban','CustomerController@ban')->name('BanCustomer');
		Route::get('customer_/{id}/{ban}/Ban','CustomerController@BanControl')->name('customer_ban');
		Route::resource('Service','ServiceController');
		Route::resource('CustomerType','CustomerTypeController');
		Route::resource('Product','ProductController');
		Route::resource('order','OrderController');
		Route::resource('Blog','BlogController');
		Route::resource('Tag','TagController');
		Route::post('Tag/delete','TagController@delete')->name('Tag_delete');
		Route::resource('Comments','CommentsController');
		Route::get('logout','LoginController@logout')->name('logout');
	});
});
