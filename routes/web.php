<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderListController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\RiderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MenuListController;
use App\Models\Menu_list;
use App\Models\Order_list;

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

// manage restaurant
Route::group(['prefix' => 'manage-restaurant', 'as' => 'manage-restaurant.'], function () {

    Route::get('/view', [RestaurantController::class, 'index'])->name('all');
    Route::get('/view/{restaurant_id}', [RestaurantController::class, 'view'])->name('view');
    Route::get('/create', [RestaurantController::class, 'create'])->name('create');
    
    Route::post('/add', [RestaurantController::class, 'store'])->name('store');
    // Route::post('/update/{restaurant_id}'. [RestaurantController::class, 'update']);
    // Route::get('/delete/{restaurant_id}', [RestaurantController::class]);

    // Route::get('/')

});


// manage menu
Route::group(['prefix' => 'manage-menu', 'as' => 'manage-menu.'], function () {
    
    Route::get('/index', [MenuListController::class, 'index'])->name('by-restaurant');

    Route::get('/view/{restaurant_id}', [MenuListController::class, 'viewMenu'])->name('view');
    Route::post('/add-menu', [MenuListController::class, 'store'])->name('add');

    Route::get('/edit-menu/{restaurant_id}', [MenuListController::class, 'edit']);
    Route::post('/update', [MenuListController::class, 'update']);

    Route::get('/delete-menu/{restaurant_id}', [MenuListController::class, 'destroy']);


});

// manage user
Route::group(['prefix' => 'manage-user', 'as' => 'manage-user.'], function () {

    Route::get('/view', [UserController::class, 'index']);

});

// manage order
Route::group(['prefix' => 'manage-order', 'as' => 'manage-order.'], function () {

    Route::get('/index', [OrderListController::class, 'index'])->name('index');

    Route::get('/cart/{menu_id}', [OrderListController::class, 'addToCart'])->name('add-cart');

});

// manage cart
Route::group(['prefix' => 'manage-cart', 'as' => 'manage-cart.'], function(){
    Route::get('/index', [CartController::class, 'showCart'])->name('index');

    Route::get('/checkout', [CartController::class, 'checkoutCart'])->name('checkout');
});

// manage delivery
Route::group(['prefix' => 'manage-delivery', 'as' => 'manage-delivery.'], function() {
    Route::get('/index', [DeliveryController::class, 'index'])->name('index');
});

// manage rider
Route::group(['prefix' => 'manage-rider', 'as' => 'manage-rider.'], function () {

    Route::get('/view', [RiderController::class, 'index']);

    Route::post('/add', [RestaurantController::class, 'store']);
    // Route::post('/update/{rider_id}'. [RestaurantController::class, 'update']);
    // Route::get('/delete/{rider_id}', [RestaurantController::class]);

});

// manage complaint
Route::group(['prefix' => 'manage-complaint', 'as' => 'manage-complaint.'], function () {

    Route::get('/view', [ComplaintController::class, 'index']);
    Route::get('/create', [ComplaintController::class, 'create']);

    Route::post('/add', [RestaurantController::class, 'store']);
    // Route::post('/update/{complaint_list_id}'. [RestaurantController::class, 'update']);
    // Route::get('/delete/{complaint_list_id}', [RestaurantController::class]);

});



Route::get('/', [IndexController::class, 'index'])->name('home');

require __DIR__.'/auth.php';
