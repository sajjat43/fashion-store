<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Fontend\HomeController;
use App\Http\Controllers\Backend\ProductController;

use App\Http\Controllers\Fontend\UserLoginController;
use App\Http\Controllers\SslCommerzPaymentController;

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
//
Route::get('/shop/category/', [HomeController::class, 'shop_category'])->name('shop.catagory');
// Route::get('/shop/Brand/', [HomeController::class, 'shop_Brand'])->name('shop.brand');
Route::get('/product/under/category/{category_id}', [HomeController::class, 'productUnderCategory'])->name('product.under.catagory');
Route::get('/product/under/brand/{brand_id}', [HomeController::class, 'productUnderBrand'])->name('product.under.brand');

// ------------website login-------
Route::get('/user/login', [HomeController::class, 'userLogin'])->name('website.user.login');
Route::get('/User/regestation', [UserController::class, 'UserRegestation'])->name('User.regestation');
Route::post('/User/regestation/store', [UserController::class, 'UserRegestationstore'])->name('User.regestation.store');

// ------ user login + logout view--
Route::post('/User/login', [UserLoginController::class, 'loginView'])->name('user.login.view');
Route::get('/User/logout', [UserLoginController::class, 'logOut'])->name('user.logout');

//cerisol
Route::get('/product/crisis/{product_id}', [ProductController::class, 'crisis'])->name('crisis.view');

// featured product
Route::get('/product/featured/slider', [ProductController::class, 'featured_product'])->name('featured.product');


// product single view
Route::get('/product/single/view/{id}', [ProductController::class, 'product_single_view'])->name('product.single.view');

// ================cart view=======================
Route::get('/cart/view', [ProductController::class, 'cartview'])->name('cart.view');
route::get('/add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
Route::get('/clear-cart', [ProductController::class, 'clearCart'])->name('cart.clear');

// card qty update
Route::get('/cart/qty/update/{id}', [ProductController::class, 'cartQty_update'])->name('cart.qty.update');
// Route::get('/remove-cart', [ProductController::class, 'removeCart'])->name('remove.cart');




Route::get('/', [HomeController::class, 'home'])->name('manage.home');
Route::group(['middleware' => 'auth'], function () {



    // SSLCOMMERZ Start


    Route::post('/pay', [SslCommerzPaymentController::class, 'index'])->name('pay.now');


    Route::post('/success', [SslCommerzPaymentController::class, 'success']);
    Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
    Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);


    //SSLCOMMERZ END
    // ------- cart request-----
    route::post('/check-out', [ProductController::class, 'checkOut'])->name('check.out');
    route::get('/check-out/form', [ProductController::class, 'checkOut_form'])->name('check.out.form');
    route::post('/check-out/form/store', [ProductController::class, 'checkOut_store'])->name('check.out.store');
    // ---------- payment method--------

});


Route::get("/form/login", [AdminController::class, 'login_view'])->name('admin.login');
Route::post("/login", [AdminController::class, 'login'])->name('login.view');




// ---------------------all backend Start--------------------

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', function () {
        return view('master');
    })->name('home');

    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    // Route::match(['get','post'],"/login",[AdminController::class,'login'])->name('login.view');
    // Route::match(['get','post'],"/form/login",[AdminController::class,'login']);
    //login route
    Route::get('/Employee/view', [EmployeeController::class, 'EmployeeView'])->name('Employee.view');
    Route::get('/employee/details/{employee_id}', [EmployeeController::class, 'Employee_single_View'])->name('Employee.single.details');
    //

    //product route
    Route::get('/product/view', [ProductController::class, 'product_view'])->name('product.view');
    Route::get('/product/create', [ProductController::class, 'product_create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'product_store'])->name('product.store');
    Route::get('/product/viewdetails/{product_id}', [ProductController::class, 'ProductViewDetails'])->name('product.view.details');
    Route::get('/product/DeleteProduct/{product_id}', [ProductController::class, 'DeleteProduct'])->name('product.delete');
    Route::post('/product/update/{product_id}', [ProductController::class, 'product_update'])->name('product.update');
    Route::get('/product/edit/{product_id}', [ProductController::class, 'product_edit'])->name('product.edit');

    // product category
    Route::get('/product/category/create', [ProductController::class, 'Category'])->name('product.category');
    Route::post('/product/category/store', [ProductController::class, 'Category_store'])->name('product.category.store');
    Route::get('/product/category/view', [ProductController::class, 'Category_view'])->name('product.category.view');

    // route::get('/product/category/edit/{id}', [ProductController::class, 'category_edit'])->name('product.category.edit');
    route::post('/product/category/update/{id}', [ProductController::class, 'category_update'])->name('product.category.update');
    route::get('/product/category/update/view/{id}', [ProductController::class, 'category_update_view'])->name('product.category.update.view');
    Route::get('Delete/category/{id}', [ProductController::class, 'DeleteCategory'])->name('category.delete');

    // Route::get('/product/deletecategory/{category_id}',[ProductController::class,'Category_delete'])->name('product.category.delete');

    //cart request view
    Route::get('product/request', [ProductController::class, 'requestList'])->name('request.list');
    Route::get('product/invoice/{id}', [ProductController::class, 'requestInvoice'])->name('request.invoice');

    // product approve and cancel
    Route::get('product/approve/{id}', [ProductController::class, 'productApprove'])->name('product.approve');
    Route::get('product/cancel/{id}', [ProductController::class, 'productCancel'])->name('product.cancel');
    // All brand
    Route::get('brand/create', [ProductController::class, 'BrandCreate'])->name('brand.create');
    Route::post('brand/store', [ProductController::class, 'BrandStore'])->name('brand.store');
    Route::get('brand/view', [ProductController::class, 'BrandView'])->name('brand.view');
});
