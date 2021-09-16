<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminCrud;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\onePageController;
use App\Http\Controllers\frontendController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\SupplierProductController;
use App\Http\Controllers\AgentController;
// use App\Models\Product;
// use App\Models\Order;
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
// Route::get('best', function () {
//     $products = Product::query()
//         ->join('orders', 'orders.product_id', '=', 'products.id')
//         ->selectRaw('products.*, SUM(orders.quantity) AS quantity_sold')
//         ->groupBy(['products.id']) // should group by primary key
//         ->orderByDesc('quantity_sold')
//         ->take(1) // 20 best-selling products
//         ->get();

//         dd($products);
//     return $products;
// });

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', [ProductController::class, 'index']);
Route::get('/showall', [ProductController::class, 'showall']);
Route::get('/catshow/{id}', [ProductController::class, 'catshow']);
Route::get('/subcatshow/{id}', [ProductController::class, 'subcatshow']);
// Route::get('/admin123', [ProductController::class, 'formindex']);

Route::get('getState',[ProductController::class, 'getState'])->name('getState');

// // Route::post('/productStore', [ProductController::class, 'store']);
Route::get('view-product/{id}', [ProductController::class, 'product_view']);

// for cart***************.START
// Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart']);
// Route::get('/cart', [ProductController::class, 'cart']);
// Route::patch('update-cart', [ProductController::class, 'update']);
// Route::delete('remove-from-cart', [ProductController::class, 'remove']);
  
// Route::get('/', [ProductController::class, 'index']);  
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('addcart/{id}', [CartController::class, 'addToCart'])->name('addcart');
Route::patch('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');

// for cart***************.END
// for district***************.start
Route::get('/district', [DistrictController::class, 'districtform']);
Route::post('/create-sub-district', [DistrictController::class, 'createsubdistrict']);
Route::post('/create-district', [DistrictController::class, 'createdistrict']);
Route::post('/create-union', [DistrictController::class, 'unioncreate']);
Route::get('/locationview', [DistrictController::class, 'locationview']);
Route::get('/edit-location-form/{id}', [DistrictController::class, 'editdistform']);
Route::PATCH('/updatelocation/{id}', [DistrictController::class, 'updatedist']);
Route::get('/sublocation-edit-form/{id}', [DistrictController::class, 'editsubdistform']);
Route::PATCH('/subdistupdate/{id}', [DistrictController::class, 'subdistupdate']);
Route::delete('/deletedist/{id}', [DistrictController::class, 'deletedist']);
Route::delete('/deletesubdist/{id}', [DistrictController::class, 'deletesubdist']);
// for district***************.end
// Admin crude control .START
// Route::get('/crdex', [AdminCrud::class, 'crIndex']);
Route::get('/crOrder', [AdminCrud::class, 'crOrder']);
Route::post('/crStore', [AdminCrud::class, 'crStore']);
Route::get('/crCreate', [AdminCrud::class, 'crCreate']);
Route::get('/crComment', [AdminCrud::class, 'crComment']);
Route::delete('/comdel/{id}', [AdminCrud::class, 'comdel']);
Route::delete('/orderdel/{id}', [AdminCrud::class, 'orderdel']);

// Route::get('/crShow/{$id}', [AdminCrud::class, 'crShow']);
// Route::put('/crUpdate/{$id}', [AdminCrud::class, 'crUpdate']);
Route::delete('/crDestroy/{id}', [AdminCrud::class, 'crDestroy'])->name('crDestroy');
// Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('destroy');
// Route::get('/crEdit/{$id}/edit', [AdminCrud::class, 'crEdit']);
//FOR CATEGORY
Route::get('/crCategory', [AdminCrud::class, 'categoryform']);
Route::post('/categorystore', [AdminCrud::class, 'crCatStore']);
// Route::get('/subcategoryform', [AdminCrud::class, 'subcategoryform']);
Route::post('/subcategorystore', [AdminCrud::class, 'subcategorystore']);
Route::get('/categoryview', [AdminCrud::class, 'categoryview']);
Route::delete('/categorydelete/{id}', [AdminCrud::class, 'categorydelete']);
Route::delete('/subcatdelete/{id}', [AdminCrud::class, 'subcatdelete']);
Route::get('/editcategory/{id}', [AdminCrud::class, 'editcategory']);
Route::get('/editsubcategory/{id}', [AdminCrud::class, 'editsubcategory']);
Route::PATCH('/catupdate/{id}', [AdminCrud::class, 'catupdate']);
Route::PATCH('/subcatupdate/{id}', [AdminCrud::class, 'subcatupdate']);




//admin slider
// Route::get('/sliderindex', [AdminCrud::class, 'sliderindex']);
Route::get('/sliderform', [AdminCrud::class, 'sliderform']);
Route::post('/sliderstore', [AdminCrud::class, 'sliderstore']);
Route::delete('/sliderdelete/{id}', [AdminCrud::class, 'sliderdelete'])->name('sliderdelete');


//admin slider
// Admin crude control .END

//SupplierProductController start


//SupplierProductController End
//onpage controller
// Route::get('onepage/{id}', [onePageController::class, 'onepage']);
// Route::get('search', [onePageController::class, 'search']);
// Route::post('comment', [onePageController::class, 'comment'])->middleware('auth');
// Route::get('autocomplete', [onePageController::class, 'autocomplete']);
//onpage controller


// SSLCOMMERZ Start
// Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);
// Route::get('/getdist',[SslCommerzPaymentController::class, 'getdist']);
Route::post('/pay', [SslCommerzPaymentController::class, 'index'])->middleware('auth');
Route::get('getlocation', [SslCommerzPaymentController::class, 'getlocation']);
Route::get('service-cost', [SslCommerzPaymentController::class, 'servicecost']);
Route::get('unions', [SslCommerzPaymentController::class, 'unions']);
// Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);
// Route::post('/success', [SslCommerzPaymentController::class, 'success']);
// Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
// Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);
// Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
// //SSLCOMMERZ END

/// resiter first 

Route::get('regifirststep', [SslCommerzPaymentController::class, 'regifirststep'])->name('regifirststep');

Route::get('/customer', [SslCommerzPaymentController::class, 'customerform'])->name('customer');
// new route start for fronentcontroller
//  Route::get('/', [frontendController::class, 'index']);

//new route End for fronentcontroller

Route::get('/Prmmagent102', [AgentController::class, 'agentform']);
// https://pykari.com/Prmmagent102
Route::get('getagentdistrict', [AgentController::class, 'agentdistrict']);
Route::get('agentunions', [AgentController::class, 'agentunions']);

// Auth::routes();

// ->middleware('is_admin');
// Route::get('/admin/home', [HomeController::class, 'crIndex'])->name('admin.home');
Auth::routes();

Route::get('/admin/home', [HomeController::class, 'crIndex'])->name('admin.home')->middleware('is_admin');
Route::get('/supplierrequest', [SupplierProductController::class, 'supplierrequest'])->name('supplierrequest')->middleware('is_admin');
Route::get('/repending/{id}', [SupplierProductController::class, 'repending'])->name('repending')->middleware('is_admin');
Route::get('/approving/{id}', [SupplierProductController::class, 'approving'])->name('approving')->middleware('is_admin');
Route::get('supplier/home', [SupplierProductController::class, 'supplierindex'])->name('supplier.home')->middleware('supplieradmin');
Route::get('/admin/agent', [AgentController::class, 'agentindex'])->name('admin.agent')->middleware('agentadmin');
Route::get('/supplier-orders/table', [SupplierProductController::class, 'supplierorders'])->name('supplier-orders.table');
Route::get('/supplierupload', [SupplierProductController::class, 'supplierupload'])->name('supplierupload')->middleware('supplieradmin');
// Route::get('admin/super', [HomeController::class, 'superAdmin'])->name('admin.super');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\HomeController::class,'logout']);

