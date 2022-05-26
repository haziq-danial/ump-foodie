<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderListController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\RiderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ComplaintController;


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

    Route::get('/view', [RestaurantController::class, 'index']);
    Route::get('/menu-lists', [RestaurantController::class, 'menuList']);

});

// manage user
Route::group(['prefix' => 'manage-user', 'as' => 'manage-user.'], function () {

    Route::get('/view', [UserController::class, 'index']);

});

// manage order
Route::group(['prefix' => 'manage-order', 'as' => 'manage-order.'], function () {

    Route::get('/view', [OrderListController::class, 'index']);

});

// manage rider
Route::group(['prefix' => 'manage-rider', 'as' => 'manage-rider.'], function () {

    Route::get('/view', [RiderController::class, 'index']);

});

// manage complaint
Route::group(['prefix' => 'manage-complaint', 'as' => 'manage-complaint.'], function () {

    Route::get('/view', [ComplaintController::class, 'index']);

});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
