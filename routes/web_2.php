<?php

use App\Http\Controllers\add_to_cart;
use App\Http\Controllers\admin\admin_loginController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\dashboardController;
use App\Http\Controllers\admin\product_itemController;
use App\Http\Controllers\admin\shipping_by_country;
use App\Http\Controllers\admin\Subcategory;
use App\Http\Controllers\admin\up_del_ProductController;
use App\Http\Controllers\admin\customers;
use App\Http\Controllers\admin\orders;

use App\Http\Controllers\dealzController;
use App\Http\Controllers\checkoutController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\productController;
use App\Http\Controllers\web_customer_account;
use App\Http\Controllers\web_customer_login;
use App\Http\Controllers\web_product_controller;
use App\Http\Controllers\web_product_detailed;
use App\Http\Controllers\ContactFrontController;
use App\Http\Controllers\AboutFrontController;
use App\Http\Controllers\QuicklinkControler;
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

// Route::get('/', function () {
//     return view('web.home');
// });


//cache clear routes
Route::get('/clear-route-cache', function () {
    Artisan::call('route:cache');
    return 'Routes cache has clear successfully !';
});
//clear config cache
Route::get('/clear-config-cache', function () {
    Artisan::call('config:cache');
    return 'Config cache has clear successfully !';
});

// clear application cache
Route::get('/clear-app-cache', function () {
    Artisan::call('cache:clear');
    return 'Application cache has clear successfully!';
});

// clear view cache
Route::get('/clear-view-cache', function () {
    Artisan::call('view:clear');
    return 'View cache has clear successfully!';
});



// route for website
Route::get('/', [homeController::class,'index'])->name('home.main');
Route::get('/products', [web_product_controller::class,'index']);
Route::get('web/products/detailed/{id}', [web_product_detailed::class,'index']);
Route::post('web/products/detailed/addreview/',[web_product_detailed::class,'add_review'])->name('productdetailed.addreview');
Route::get('/contact',[ContactFrontController::class,'showContactPage'])->name('home.contact');
// route for dealz
Route::get('/delaz', [dealzController::class,'index']);
Route::get('/about',[AboutFrontController::class,'showAboutPage'])->name('home.about');
Route::get('/our-history',[AboutFrontController::class,'showOurHistry']);
Route::get('/our-team',[AboutFrontController::class,'showOurTeam']);

Route::get('/privacy-policy',[QuicklinkControler::class,'privacyPolicy'])->name('quciklinks.privacypolicy');
Route::get('/return-policy',[QuicklinkControler::class,'returnPolicy'])->name('quciklinks.returnpolicy');
Route::get('/terms-and-conditions',[QuicklinkControler::class,'termsandConditions'])->name('quciklinks.terms');
Route::get('/everspice-food-policy',[QuicklinkControler::class,'evfoodPolicy'])->name('quciklinks.evfoodpolicy');
Route::get('/privacy-statement',[QuicklinkControler::class,'privacyStatement'])->name('quciklinks.privacyStatement');


Route::get('web/customer/login/check', [web_customer_login::class,'customer_login_check']);
Route::post('web/customer/login/check/verify', [web_customer_login::class,'customer_login_check_verify']);
Route::get('web/customer/register', [web_customer_login::class,'customer_register_view']);
Route::post('web/customer/register/new', [web_customer_login::class,'customer_register_new']);
Route::get('web/customer/signout', [web_customer_login::class,'logout']);


// Route::get('verfity_for_checkout', [web_customer_login::class,'check_login_for_checkout']);
Route::get('verfity_for_checkout', [checkoutController::class,'check_login_for_checkout']);

Route::get('web/customer/account', [web_customer_account::class,'index']);


// route for directpay
Route::post('directpay', [checkoutController::class,'directpay_start']);
// Route::post('add_order_details', [checkoutController::class,'add_order_details']);

// Route::post('add_order_details', [checkoutController::class,'add_order_details']);
Route::post('add_order_details', [checkoutController::class,'add_order_details']);
// route for directpay

Route::post('add/to/cart', [add_to_cart::class,'add']);
Route::get('cart', [add_to_cart::class,'cart']);
Route::get('cart_json', [add_to_cart::class,'cart_json']);
Route::get('cart_json_delete/{uid}', [add_to_cart::class,'item_delete']);

Route::get('checkout', [checkoutController::class,'index']);

// route for admin dashboard

 
Route::get('/admin/dashboard', [dashboardController::class,'index']);

Route::get('/admin/login', [admin_loginController::class,'index']);
Route::post('/admin/login',[admin_loginController::class,'check_login']);
Route::get('logout',[admin_loginController::class,'logout']);

Route::get('/admin/category', [CategoryController::class,'index']);


Route::post('/admin/category',[CategoryController::class,'add_category']);

Route::post('/admin/category/edit',[CategoryController::class,'edit_category']);

Route::post('/admin/category/delete',[CategoryController::class,'delete_category']);

Route::get('/admin/reviews', [product_itemController::class,'reviews']);

Route::post('/admin/reviews/edit',[product_itemController::class,'edit_review']);

Route::post('/admin/reviews/delete',[product_itemController::class,'delete_review']);




Route::get('/admin/subcategory/{sub_id}', [Subcategory::class,'index']);

Route::post('/admin/subcategory/', [Subcategory::class,'add_subcategory']);

Route::post('/admin/subcategory/edit', [Subcategory::class,'edit_subcategory']);

Route::post('/admin/subcategory/delete', [Subcategory::class,'delete_subcategory']);

Route::get('/admin/product',[product_itemController::class,'index']);

Route::post('/admin/product',[product_itemController::class,'add_product']);


Route::get('/admin/product/displaysubcat/{cat_id}',[product_itemController::class,'displaysubcat']);

Route::get('/admin/producthome',[up_del_ProductController::class,'index']);

Route::get('/admin/producthome/edit/{id}',[up_del_ProductController::class,'edit_product']);

Route::put('/admin/producthome/update{id}',[up_del_ProductController::class,'update_product']);

Route::post('/admin/producthome/delete',[up_del_ProductController::class,'delete_product']);


// routes for add shipping prices for countries
Route::get('/admin/country_shipping',[shipping_by_country::class,'index']);
Route::post('/admin/country_shipping',[shipping_by_country::class,'add']);
Route::post('/admin/country_shipping/delete',[shipping_by_country::class,'delete']);
Route::post('/admin/country_shipping/edit',[shipping_by_country::class,'edit']);

// route for customers
Route::get('/admin/customers',[customers::class,'index']);



// route for customers
Route::get('/admin/orders',[orders::class,'index']);
Route::get('/admin/orders_details{id}',[orders::class,'invoice']);









