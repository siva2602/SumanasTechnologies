<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [ProductController::class, 'listAllProducts'])->name('product.list');
Route::get('/home', [ProductController::class, 'listAllProducts'])->name('home');

Auth::routes();

Route::post('/product/checkout/{id}', [ProductController::class, 'checkout'])->name('checkout');
Route::get('/payment/success', [ProductController::class, 'success'])->name('checkout.success');
Route::get('/payment/cancel', [ProductController::class, 'cancel'])->name('checkout.cancel');
Route::post('/webhook', [ProductController::class, 'webhook'])->name('checkout.webhook');
