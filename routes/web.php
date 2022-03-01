<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/test', function (){


});
    Route::get('/', 'HomeController@home')->name('home');

Route::prefix('auth')->namespace('Auth')->middleware('guest')->group(function (){
    Route::get('login' , 'LoginController@showform')->name('login');
    Route::post('login' , 'LoginController@login');
    Route::get('token' , 'TokenController@showToken')->name('auth.token');
    Route::post('token' , 'TokenController@token');
});

Route::get('/articles', 'ArticleController@articles')->name('articles');
Route::get('/article/{slug}', 'ArticleController@single')->name('single.article');
Route::post('/comment', 'CommentController@store')->name('comment');

Route::get('/contact' , 'ContactController@contact')->name('contact');
Route::post('/contact' , 'ContactController@store');


Route::get('/about-us' , 'HomeController@about')->name('about');

Route::prefix('profile')->namespace('User')->middleware('auth')->group(function () {
    Route::get('/', 'UserController@index')->name('user');
    Route::put('/edit', 'UserController@edit')->name('user.edit');
    Route::get('/token', 'UserController@token')->name('user.token');
    Route::post('/token', 'UserController@ValidToken')->name('user.token');
    Route::get('/orders', 'OrderController@order')->name('user.order');
    Route::post('/logout', 'UserController@logout')->name('logout');
    Route::post('/order/', 'OrderController@store')->name('order.store');
});

Route::post('/order/check' , 'User\CartController@check')->name('order.check');
Route::get('/cart' , 'User\CartController@cart')->name('order.cart');
Route::get('bio' , function (){
    return view('bio');
});

Route::post('/order/store' , 'User\OrderController@store')->name('order.store');
Route::post('/payment/callback' , 'User\PaymentController@callback')->name('payment.callback');
Route::post('/check_discount/{discount}', 'User\OrderController@check_discount');


