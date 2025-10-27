<?php

use App\Http\Controllers\OrderController;
use App\Models\Order;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DishesController;

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

Route::get('/', [OrderController::class,'index'])->name('order.form');
Route::post('order_submit', [OrderController::class, 'submit'])->name('order.submit');

//This is DishesController in Kitchen
Route::resource('dish', DishesController::class);
//This is OrderController in Kitchen
Route::get('order', [DishesController::class, 'order'])->name('kitchen.order');
Route::get('order/{order}/approve', [DishesController::class, 'approve']);
Route::get('order/{order}/cancel', [DishesController::class, 'cancel'])->name('kitchen.order');
Route::get('order/{order}/ready', [DishesController::class, 'ready'])->name('kitchen.order');

Route::get('order/{order}/serve', [OrderController::class, 'serve'])->name('kitchen.order');




Auth::routes([
    'register' => false,  // Disable registration routes
    'reset' => false,     // Disable password reset routes
    'verify' => false,    // Disable email verification routes
]);
