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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Stripe関連
// Route::get('/user/payment', 'PaymentController@getCurrentPayment')->name('user.payment');
Route::get('/user/payment/form', 'PaymentController@getPaymentForm')->name('user.payment.form');
Route::post('/user/payment/store', 'PaymentController@storePaymentInfo')->name('user.payment.store');
Route::post('/user/payment/destroy', 'PaymentController@deletePaymentInfo')->name('user.payment.destroy');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('shop', 'ShopController');
    Route::resource('ticket', 'TicketController');
    Route::resource('order', 'OrderController');
    Route::resource('profile', 'ProfileController');
    Route::get('mypage', 'MypageController@index')->name('mypage');
    Route::get('mypage/shop', 'MypageController@shop')->name('mypage.shop');
    Route::get('mypage/order', 'MypageController@order')->name('mypage.order');
    Route::get('mypage/supporter', 'MypageController@supporter')->name('mypage.supporter');
});