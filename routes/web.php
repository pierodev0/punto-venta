<?php

use App\Http\Controllers\BusinessController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth')->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('providers', ProviderController::class);
    Route::resource('products', ProductController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('users', UserController::class);

    Route::resource('purchases', PurchaseController::class)->names('purchases')->except([
        'edit', 'update', 'destroy'
    ]);

     Route::resource('sales', SaleController::class)->names('sales')->except([
        'edit', 'update', 'destroy'
    ]);


    Route::get('purchases/pdf/{purchase}', [PurchaseController::class,'pdf'])->name('purchases.pdf');
    Route::get('sales/pdf/{sale}', [SaleController::class,'pdf'])->name('sales.pdf');
    
    Route::resource('business', BusinessController::class)->names('business')->only([
        'index', 'update'
    ]);
    Route::resource('printers', PrinterController::class)->names('printers')->only([
        'index', 'update'
    ]);
    

});

Route::get('/home', function () {
    return view('prueba');
})->name('home');

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified']);

Route::get('/', function () {
   return view('welcome');
});



Route::get('logout',function(){

})->name('logout');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
