<?php

use App\Order;
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
    return dd(Order::where('status', 'paid')->orwhere('status', 'prepartion')->get());
});
Route::get('/panel', 'HomeController@home')->name('panel');

Route::resource('user' , 'UserController');
Route::get('permission/user/{id}' , 'UserPermissionController@create')->name('user.permission');
Route::post('permission/user/{id}' , 'UserPermissionController@store');

Route::resource('permission' , 'PermissionController')->except('show');
Route::resource('Role' , 'RoleController')->except('show');

Route::resource('categoryA' , 'CategoryController')->except('show');
Route::put('categorya/delete/{id}' , 'CategoryController@restor')->name('categorya.restor');
Route::resource('article' , 'ArticleController')->except('show');


Route::get('/comments' , 'CommentController@index')->name('comments');
Route::put('/comments/approved/{id}' , 'CommentController@approve')->name('comments.approve');
Route::post('/comments/send' , 'CommentController@send')->name('comments.send');
Route::delete('/comments/{id}/delete' , 'CommentController@delete')->name('comments.delete');

Route::get('date/index' , 'DateController@index')->name('date.index');
Route::get('date' , 'DateController@show')->name('date');
Route::post('date' , 'DateController@post');
Route::delete('date/{date}' , 'DateController@delete')->name('date.delete');
//
Route::resource('vila' , 'VillaController');
Route::resource('vila/{vila}/gallery' , 'VilaGalleryController');
Route::post('attribute/values' , 'AttributeController@getValues');
Route::post('attribute/delete' , 'AttributeController@delete');
//
Route::get('contact' , 'ContactController@index')->name('contact.index');
Route::delete('Contact/{id}/delete' , 'ContactController@delete')->name('contact.delete');
Route::post('contact/{id}' , 'ContactController@approved')->name('contact.approved');
Route::get('/contact/{id}/send' , 'ContactController@send')->name('contact.send');
Route::post('/contact/{id}/send' , 'ContactController@send_sms')->name('contact.send.sms');
//
Route::resource('discount' , 'DiscountController')->except('show');
//
Route::resource('orders' , 'OrderController');
Route::put('/order/cancel/{id}' , 'OrderController@cancel')->name('order.cancel');
//
Route::get('/option' , 'OptionController@index')->name('option.index');
Route::post('/option' , 'OptionController@update');
//
Route::resource('slider' , 'SliderController')->except('show');
//
Route::resource('vila' , 'VilaController')->except('show');

Route::get('/sms/send','SmsController@show')->name('sms.send');
Route::post('/sms/send','SmsController@send');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
