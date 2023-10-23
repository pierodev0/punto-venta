<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleController;
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

Route::resource('categories',CategoryController::class);
Route::resource('providers',ProviderController::class);
Route::resource('products',ProductController::class);
Route::resource('clients',ClientController::class);
Route::resource('purchases',PurchaseController::class);
Route::resource('sales',SaleController::class);

Route::get('/home', function () {
    return view('prueba');
})->name('home');



Route::get('logout',function(){

})->name('logout');