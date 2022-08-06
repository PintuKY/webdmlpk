<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Seller\SellerServiceController;

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\Seller\CategoryController;
use App\Http\Controllers\Seller\ShopController;
use App\Http\Controllers\Seller\ProductController;
use App\Http\Controllers\Seller\OrderController;
use App\Http\Controllers\Customer\Cartcontroller;
use App\Http\Controllers\Customer\PaymentController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Seller\HotelController;
use App\Http\Controllers\Customer\LoginController;



Route::get('/cache', function () {     Artisan::call('config:cache'); 	Artisan::call('view:cache'); 	Artisan::call('route:clear'); 	 	return "clear"; });

Route::post('doLoginWithOTP',[LoginController::class,'doLoginWithOTP'])->name('doLoginWithOTP');
Route::post('OtpVerify',[LoginController::class,'OtpVerify'])->name('OtpVerify');
Route::post('searchTerm',[WelcomeController::class,'searchTerm'])->name('searchTerm');
 Route::post('registerCustomer',[LoginController::class,'doregister'])->name('customer.register');


Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/service/{slug}', [WelcomeController::class, 'service'])->name('service');
Route::get('/services/{slug}', [WelcomeController::class, 'services'])->name('services');
Route::post('/services/{slug}', [WelcomeController::class, 'stay_lists'])->name('search-stay');
Route::get('/shop/{id}',[WelcomeController::class, 'shopProducts'])->name('shop.products');
Route::get('/sellerServices/{id}/service/{sid}',[WelcomeController::class, 'serviceSeller'])->name('shop.services');
Route::get('/educationList/{id}',[WelcomeController::class, 'instituteEducation'])->name('institute.education');
Route::get('/hospitalList/{id}',[WelcomeController::class, 'hospitalHealth'])->name('hospital.health');
Route::get('/sellerAllServices/{id}',[WelcomeController::class, 'shopServices'])->name('shop.allservices');
Route::get('/shop/{seller_id}/category/{category_id}',[WelcomeController::class, 'shopCategory'])->name('shop.category');
Route::get('/shop/{seller_id}/product/{category_id}',[WelcomeController::class, 'shopProductDetails'])->name('shop.product');
Route::post('shop/saveQuote',[WelcomeController::class, 'saveQuote'])->name('saveQuote');
Route::post('saveContact',[WelcomeController::class, 'saveContact'])->name('saveContact');
Route::post('saveReview',[CustomerController::class,'rating'])->name('saveReview');

Route::get('/stay-booking/{id}',[WelcomeController::class, 'stayBookingSearch'])->name('stay-booking.health');
Route::get('staybooking-checkout',[PaymentController::class,'stayBookingCheckout'])->name('stayBookingCheckout');
Route::post('new-login',[LoginController::class,'newLogin'])->name('customer.login');

// Cart
Route::get('cart',[Cartcontroller::class,'index']);
Route::post('add-to-cart',[Cartcontroller::class,'addToCart'])->name('add-to-cart');
Route::post('increment-cart',[Cartcontroller::class,'increaseCartQuantity']);
Route::post('decrement-cart',[Cartcontroller::class,'decreaseCartQuantity']);
Route::post('delete-cart',[Cartcontroller::class,'deleteCartQuantity']);
// Cart

// Checkout
Route::post('makepaymentCashonDelivery',[PaymentController::class,'makepaymentCashonDelivery'])->name('ecom.makepaymentCashonDelivery');
Route::get('checkout',[Cartcontroller::class,'checkout']);
Route::get('serviceCheckout/{id}',[CustomerController::class,'servicecheckout']);
Route::post('serviceMakePayment',[PaymentController::class,'serviceMakePayment'])->name('service.makepayment');
Route::post('servicePayment',[PaymentController::class,'servicePayment'])->name('service.servicePayyouPayment');
Route::post('ecomMakePayment',[PaymentController::class,'ecomMakePayment'])->name('ecom.makepayment');
Route::post('ecomPayyouPayment',[PaymentController::class,'ecomPayyouPayment'])->name('ecom.ecomPayyouPayment');
Route::post('paymentfailed',[PaymentController::class,'paymentfailed']);
Route::get('thankyou',[PaymentController::class,'thankyou']);
Route::post('staybooking/makepayment',[PaymentController::class,'stayBookingPayment'])->name('staybooking.makepayment');
Route::post('staybookingPayyouPayment',[PaymentController::class,'staybookingPayyouPayment'])->name('staybookingPayyouPayment');

Route::get('PickUpcheckout/{id}',[CustomerController::class,'pickUpCheckout']);
Route::post('pickUpMakePayment',[PaymentController::class,'pickUpMakePayment'])->name('pickUp.makepayment');
Route::post('pickPayyouPayment',[PaymentController::class,'pickPayyouPayment'])->name('pickUp.payyouPayment');
Route::post('distance',[WelcomeController::class,'getdistance']);
// Checkout

//User
Route::get('myaccount', [CustomerController::class, 'myaccount']);
Route::post('change-password',[CustomerController::class,'changePassword']);
Route::post('customer/updateProfile',[CustomerController::class,'updateProfile']);
Route::get('customer/orderDetail/{order_id}',[CustomerController::class,'orderDetails']);
//User

Route::get('/about-us', [WelcomeController::class, 'about_us'])->name('about-us');
Route::get('contactus', [WelcomeController::class, 'contactus'])->name('contactus');

Route::get('/doctors-booking-list-details', [WelcomeController::class, 'doctors_booking_list_details'])->name('doctors-booking-list-details');

Route::get('/doctors-name-list', [WelcomeController::class, 'doctors_name_list'])->name('doctors-name-list');

Route::get('/education-categories', [WelcomeController::class, 'education_categories'])->name('education-categories');

Route::get('/educations-list-details', [WelcomeController::class, 'educations_list_details'])->name('educations-list-details');

Route::get('/educations-name-list', [WelcomeController::class, 'educations_name_list'])->name('educations-name-list');

Route::get('/food-categories', [WelcomeController::class, 'food_categories'])->name('food-categories');

Route::get('/food-menu-list', [WelcomeController::class, 'food_menu_list'])->name('food-menu-list');

Route::get('/food-menu-list', [WelcomeController::class, 'food_menu_list']);

Route::get('/food-shop-name-list', [WelcomeController::class, 'food_shop_name_list']);

Route::get('forget-password', [WelcomeController::class, 'forget_password']);

Route::get('govt-categories', [WelcomeController::class, 'govt_categories']);

Route::get('pick-drop-categories', [WelcomeController::class, 'pick_drop_categories']);

Route::get('govt-department-name-list', [WelcomeController::class, 'govt_department_name_list']);

Route::get('health-categories', [WelcomeController::class, 'health_categories']);

Route::get('professional-categories', [WelcomeController::class, 'professional_categories']);

Route::get('service-categories', [WelcomeController::class, 'service_categories']);

Route::get('shop-categories', [WelcomeController::class, 'shop_categories']);

Route::get('hospital-booking-list-details', [WelcomeController::class, 'hospital_booking_list_details']);

Route::get('professional-list-details', [WelcomeController::class, 'professional_list_details']);

Route::get('service-list-details', [WelcomeController::class, 'service_list_details']);

Route::get('stay-booking-list-details', [WelcomeController::class, 'stay_booking_list_details']);

Route::get('pick-drop-booking-list-details', [WelcomeController::class, 'pick_drop_booking_list_details']);

Route::get('hospital-name-list', [WelcomeController::class, 'hospital_name_list']);

Route::get('stay-booking-list', [WelcomeController::class, 'stay_booking_list']);

//Route::get('stay-booking', [WelcomeController::class, 'stay_booking']);

Route::get('terms-and-conditions', [WelcomeController::class, 'terms_and_conditions']);

Route::get('wishlist', [WelcomeController::class, 'wishlist']);

Route::get('professional-name-list', [WelcomeController::class, 'professional_name_list']);

Route::get('shop-name-list', [WelcomeController::class, 'shop_name_list']);

Route::get('shop-product-list', [WelcomeController::class, 'shop_product_list']);

Route::get('single-product-details', [WelcomeController::class, 'single_product_details']);

Route::get('service-name-list', [WelcomeController::class, 'service_name_list']);

Route::get('pick-drop-name-list', [WelcomeController::class, 'pick_drop_name_list']);

Route::get('/login', [WelcomeController::class, 'login'])->name('login');

Route::get('privacy-policy', [WelcomeController::class, 'privacy_policy']);

Route::get('register', [WelcomeController::class, 'register']);


Route::group(['prefix'=>'seller'], function(){
    Route::get('login',[SellerController::class,'login'])->name('seller.login');
    Route::post('login',[SellerController::class,'dologin'])->name('seller.login');
    Route::get('register',[SellerController::class,'register'])->name('seller.register');
    Route::post('register',[SellerController::class,'doregister'])->name('seller.register');
    Route::post('fetch_sub_services',[SellerController::class,'fetch_sub_services'])->name('seller.fetch_sub_services');
        Route::post('verifyAccount',[SellerController::class,'verifyAccount'])->name('seller.verify.account');
    Route::middleware([Seller::class])->group(function () {

        Route::get('shops',[ShopController::class,'index'])->name('seller.shop.index');
        Route::post('shopUpdate',[ShopController::class,'update'])->name('seller.shop.update');
		  Route::post('deliveryUpdate',[ShopController::class,'updateDelivery'])->name('seller.shop.delivery');
        Route::get('home',[SellerController::class,'dashboard'])->name('seller.index');
        //Category
        Route::get('categories',[CategoryController::class,'index'])->name('seller.category.index');
        Route::get('categories/create',[CategoryController::class,'create'])->name('seller.category.create');
        Route::post('categories/store',[CategoryController::class,'store'])->name('seller.category.store');
        Route::get('category/{id}/edit',[CategoryController::class,'edit'])->name('seller.category.edit');
        Route::patch('category/{id}/update',[CategoryController::class,'update'])->name('seller.category.update');
        Route::delete('category/delete/{id}',[CategoryController::class,'destroy'])->name('seller.category.destroy');
        //Category

        //Products
        Route::get('products',[ProductController::class,'index'])->name('seller.products.index');
        Route::get('products/create',[ProductController::class,'create'])->name('seller.products.create');
        Route::post('products/store',[ProductController::class,'store'])->name('seller.products.store');
        Route::get('product/{id}/edit',[ProductController::class,'edit'])->name('seller.product.edit');
        Route::patch('product/{id}/update',[ProductController::class,'update'])->name('seller.product.update');
        Route::delete('product/delete/{id}',[ProductController::class,'destroy'])->name('seller.product.destroy');
        //Products

		//seller hotels
		Route::get('hotels',[HotelController::class,'index'])->name('seller.hotels.index');
        Route::get('hotels/create',[HotelController::class,'create'])->name('seller.hotels.create');
        Route::post('hotels/store',[HotelController::class,'store'])->name('seller.hotels.store');
        Route::get('hotels/{id}/edit',[HotelController::class,'edit'])->name('seller.hotels.edit');
        Route::patch('hotels/{id}/update',[HotelController::class,'update'])->name('seller.hotels.update');
        Route::delete('hotels/delete/{id}',[HotelController::class,'destroy'])->name('seller.hotels.destroy');

        //seller services

        Route::get('services',[SellerServiceController::class,'index'])->name('seller.sellerservices.index');
        Route::get('services/create',[SellerServiceController::class,'create'])->name('seller.sellerservices.create');
        Route::post('services/store',[SellerServiceController::class,'store'])->name('seller.sellerservices.store');
        Route::get('services/{id}/edit',[SellerServiceController::class,'edit'])->name('seller.sellerservices.edit');
        Route::patch('services/{id}/update',[SellerServiceController::class,'update'])->name('seller.sellerservices.update');
        Route::delete('services/delete/{id}',[SellerServiceController::class,'destroy'])->name('seller.sellerservices.destroy');
        //seller services
 Route::get('sellerQuotes','App\Http\Controllers\Seller\SellerController@getQuotes')->name('seller.quotes');
		Route::get('create/Quote','App\Http\Controllers\Seller\SellerController@createQuote')->name('seller.create.quote');
		Route::post('addQuote', 'App\Http\Controllers\Seller\SellerController@saveQuote')->name('seller.quote.store');
        //Orders
        Route::get('orders',[OrderController::class,'index'])->name('seller.orders.index');
        Route::post('changeOrderStatus',[OrderController::class,'changeOrderStatus']);
        Route::get('order',[OrderController::class,'orderDetail']);
        //Orders

        //Wallets
        Route::get('wallets',[ShopController::class,'wallets'])->name('seller.wallets');
        Route::post('updateBank',[ShopController::class,'updateBank'])->name('seller.bank.update');
        //Wallets
    });
});

Route::group(['prefix'=>'admin'], function(){
    Route::get('login','App\Http\Controllers\Admin\LoginController@showLoginForm');
    Route::post('login','App\Http\Controllers\Admin\LoginController@login');
    Route::middleware([SuperAdmin::class])->group(function () {
        Route::resources([
            'services' => 'App\Http\Controllers\Admin\ServiceController',
            'sub-services' => 'App\Http\Controllers\Admin\SubServiceController',
            'customers' => 'App\Http\Controllers\Admin\CustomerController',
            'banners' => 'App\Http\Controllers\Admin\BannerController',
        ]);
        //Seller
		Route::get('city','App\Http\Controllers\Admin\BannerController@viewCity')->name('city.view');
		Route::get('cityCreate','App\Http\Controllers\Admin\BannerController@createCity')->name('city.create');
		Route::post('cityAdd','App\Http\Controllers\Admin\BannerController@addCity')->name('city.add');
        Route::get('sellers','App\Http\Controllers\Admin\SellerController@index')->name('admin.sellers.index');
        Route::get('sellers/{id}/edit','App\Http\Controllers\Admin\SellerController@edit')->name('admin.sellers.edit');
        Route::get('sellers/show/{id}','App\Http\Controllers\Admin\SellerController@show')->name('admin.sellers.show');
        Route::patch('sellers/{id}/update','App\Http\Controllers\Admin\SellerController@update')->name('admin.sellers.update');
        Route::post('sellers/delete/{id}','App\Http\Controllers\Admin\SellerController@destroy')->name('admin.sellers.destroy');
        Route::get('sellers/orders/{id}','App\Http\Controllers\Admin\SellerController@showSellerorders')->name('admin.sellers.orders');
         Route::get('sellers/order','App\Http\Controllers\Admin\SellerController@orderDetail')->name('admin.sellers.orderDetail');
		Route::get('search', 'App\Http\Controllers\Admin\SellerController@search')->name('search');
        //Seller
        Route::get('sellers/wallets/{id}','App\Http\Controllers\Admin\SellerController@wallets')->name('admin.sellers.wallets');
        Route::post('seller/payToSeller','App\Http\Controllers\Admin\SellerController@payToSeller');
        Route::get('home','App\Http\Controllers\Admin\HomeController@index')->name('adminHome');
        Route::post('logout','App\Http\Controllers\Admin\LoginController@logout')->name('adminLogout');
        Route::get('contacts','App\Http\Controllers\Admin\HomeController@contacts');
        Route::post('deleteContacts','App\Http\Controllers\Admin\HomeController@deleteContacts');
		        Route::get('quotes','App\Http\Controllers\Admin\HomeController@getQuotes')->name('admin.quotes');

    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
