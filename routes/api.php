<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'App\Http\Controllers\Api\AuthController@login');
    Route::post('signup', 'App\Http\Controllers\Api\AuthController@signup');
	Route::post('sellerLogin', 'App\Http\Controllers\Api\AuthController@sellerLogin');
    Route::post('customerSignUp', 'App\Http\Controllers\Api\AuthController@customerRegister');
	Route::post('login-with-otp','App\Http\Controllers\Api\AuthController@loginWithOtp');
    Route::post('sellerlogin-with-otp','App\Http\Controllers\Api\AuthController@sellerloginWithOtp');
    Route::post('verify-login-otp','App\Http\Controllers\Api\AuthController@verifyLoginOtp');
    Route::post('verify-sellerlogin-otp','App\Http\Controllers\Api\AuthController@verifysellerLoginOtp');
  	Route::post('verify-account','App\Http\Controllers\Api\AuthController@verifyAccount');

    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::get('logout', 'App\Http\Controllers\Api\AuthController@logout');
        Route::get('user', 'App\Http\Controllers\Api\AuthController@user');
        Route::get('dashboard', 'App\Http\Controllers\Api\AuthController@dashboard');
        Route::post('changePassword', 'App\Http\Controllers\Api\AuthController@changePassword');
        Route::apiResource('category', 'App\Http\Controllers\Api\SellerCategoryController');
        Route::apiResource('product', 'App\Http\Controllers\Api\SellerProductController');
        Route::get('shop', 'App\Http\Controllers\Api\SellerShopController@index');
        Route::post('shopUpdate', 'App\Http\Controllers\Api\SellerShopController@shopupdate');
		 Route::post('deliveryUpdate','App\Http\Controllers\Api\SellerShopController@updateDelivery');
		 Route::get('deliveryCharge/{id}','App\Http\Controllers\Api\SellerShopController@getDeliveryCharge');
		Route::post('saveQuote', 'App\Http\Controllers\Api\AuthController@saveQuote');
        Route::get('wallet', 'App\Http\Controllers\Api\SellerShopController@wallets');
        Route::post('bank', 'App\Http\Controllers\Api\SellerShopController@updateBank');
        Route::get('orders', 'App\Http\Controllers\Api\SellerOrderController@index');
        Route::post('updateOrderStatus', 'App\Http\Controllers\Api\SellerOrderController@changeOrderStatus');
        Route::get('orderDetails/{id}', 'App\Http\Controllers\Api\SellerOrderController@orderDetail');
		
		Route::apiResource('hotels','App\Http\Controllers\Api\SellerHotelController');
		Route::post('hotelsUpdate/{id}','App\Http\Controllers\Api\SellerHotelController@update');
        Route::get('amenities','App\Http\Controllers\Api\SellerHotelController@amenities');
		
		Route::post('rooms/store', 'App\Http\Controllers\Api\CustomerHomeController@storeOrder');
		Route::get('rooms/{id}', 'App\Http\Controllers\Api\CustomerHomeController@viewOrderRoom');
        Route::get('cart', 'App\Http\Controllers\Api\CustomerCartController@index');
        Route::post('addCart', 'App\Http\Controllers\Api\CustomerCartController@addToCart');
        Route::put('increaseQuantity', 'App\Http\Controllers\Api\CustomerCartController@increaseCartQuantity');
        Route::put('decreaseQuantity', 'App\Http\Controllers\Api\CustomerCartController@decreaseCartQuantity');
		Route::post('updateCartQuantity','App\Http\Controllers\Api\CustomerCartController@cartQuantityUpdate');
        Route::delete('cart/{id}','App\Http\Controllers\Api\CustomerCartController@deleteCart');
		Route::get('cartCount','App\Http\Controllers\Api\CustomerCartController@cartCount');
        Route::put('updateCustomerProfile','App\Http\Controllers\Api\AuthController@updateCustomerProfile');
        Route::post('placeOrder','App\Http\Controllers\Api\CustomerPaymentController@placeOrder');
		 Route::post('booking','App\Http\Controllers\Api\CustomerPaymentController@booking');
		 Route::apiResource('sellerService', 'App\Http\Controllers\Api\SellerServiceController');
		Route::get('quotes','App\Http\Controllers\Api\AuthController@getQuotes');
		 Route::get('orderList/{id}','App\Http\Controllers\Api\CustomerHomeController@orderDetails');
		Route::post('review','App\Http\Controllers\Api\AuthController@rating');
		Route::post('stayBookingSearch/{id}','App\Http\Controllers\Api\CustomerHomeController@stayBookingSearch');
		 Route::post('stayBookingPayment','App\Http\Controllers\Api\CustomerPaymentController@staybookingPayment');
		 Route::post('noOfDays','App\Http\Controllers\Api\CustomerPaymentController@calculateDays');
		 Route::post('pickUp','App\Http\Controllers\Api\CustomerPaymentController@pickUpPayment');
		Route::post('distance/{from}/to/{to}','App\Http\Controllers\Api\CustomerHomeController@getdistance');
		Route::post('distanceAndroid/{from}/to/{to}','App\Http\Controllers\Api\CustomerHomeController@getdistanceWithDetails');
    });
});
//open routes

Route::get('services', 'App\Http\Controllers\Api\AuthController@services');
Route::get('subServices/{sid}', 'App\Http\Controllers\Api\AuthController@fetchSubServices');
Route::get('cities', 'App\Http\Controllers\Api\AuthController@getCities');
Route::get('home','App\Http\Controllers\Api\CustomerHomeController@index');
Route::get('service/{slug}','App\Http\Controllers\Api\CustomerHomeController@service');
Route::get('services/{slug}','App\Http\Controllers\Api\CustomerHomeController@services');
Route::post('stay-booking/{id}','App\Http\Controllers\Api\CustomerHomeController@stayBookingSearch');
Route::get('shopProducts/{id}','App\Http\Controllers\Api\CustomerHomeController@shopProducts');
Route::get('shopCategorySeller/{seller_id}/category/{category_id}','App\Http\Controllers\Api\CustomerHomeController@shopCategory');
Route::get('shopProductDetails/{seller_id}/product/{product_id}','App\Http\Controllers\Api\CustomerHomeController@shopProductDetails');
Route::post('saveQuote','App\Http\Controllers\Api\CustomerHomeController@saveQuote');
Route::post('saveContact','App\Http\Controllers\Api\CustomerHomeController@saveContact');
Route::get('categoryBySeller/{shopId}','App\Http\Controllers\Api\CustomerHomeController@categoriesBySeller');
Route::get('serviceBySeller/{id}','App\Http\Controllers\Api\CustomerHomeController@shopServices');
Route::get('seller/{id}/service/{sid}','App\Http\Controllers\Api\CustomerHomeController@serviceSeller');
Route::get('search/{name}', 'App\Http\Controllers\Api\CustomerHomeController@searchByName');
//forgot password
Route::group([
    'middleware' => 'api',
    'prefix' => 'password'
], function () {
    Route::post('create', 'App\Http\Controllers\Api\PasswordResetController@create');
    Route::get('find/{token}', 'App\Http\Controllers\Api\PasswordResetController@find');
    Route::post('reset', 'App\Http\Controllers\Api\PasswordResetController@reset');
});


Route::post('register','App\Http\Controllers\Api\CreateFreeAccountController@CreatefreeAccount');
Route::post('login','App\Http\Controllers\Api\CreateFreeAccountController@login');
Route::post('verify-account','App\Http\Controllers\Api\CreateFreeAccountController@verifyAccounts');
Route::post('sel');
//Route::put('update/{id}','App\Http\Controllers\Api\CreateFreeAccountController@update');

