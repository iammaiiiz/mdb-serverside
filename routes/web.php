<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;

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

Route::group(['middleware'=>'isAdmin','prefix'=>'admin'],function(){
    Route::controller(CompanyController::class)->group(function(){
        Route::get('/companies','index')->name('companies');
        Route::get('/companies/new','create')->name('companies.new');
        Route::get('/companies/edit/{id}','edit')->name('companies.edit');
        Route::get('/companies/status/{id}','changStatus')->name('companies.status');
        Route::get('/companies/{id}','show')->name('companies.show');

        Route::post('/companies/store','store')->name('companies.store');
        Route::post('/companies/update/{id}','update')->name('companies.update');
    });
    Route::controller(ProductController::class)->group(function(){
        Route::get('/products','index')->name('products');
        Route::get('/products/new','create')->name('products.new');
        Route::get('/products/edit/{GTIN}','edit')->name('products.edit');
        Route::get('/products/status/{GTIN}','changStatus')->name('products.status');
        Route::get('/products/destroy/{GTIN}','destroy')->name('products.destroy');
        Route::get('/products/image/{GTIN}','deleteImage')->name('products.image.delete');
        Route::get('/products/{GTIN}','show')->name('products.show');
        Route::get('/json/products.json','GetProductsJSON');
        Route::get('/json/{GTIN}.json','GetProductJSON');

        Route::post('/products/store','store')->name('products.store');
        Route::post('/products/update/{GTIN}','update')->name('products.update');
    });
});
Route::controller(UserController::class)->group(function(){
    Route::get('/','goAdmin')->name('goAdmin');
    Route::get('/admin','admin')->name('admin');
    Route::get('/logout','logout')->name('logout');
    
    Route::post('/login','login')->name('login');
});
Route::controller(ProductController::class)->group(function(){
    Route::get('/products/{GTIN}','showPublic')->name('public.product.show');
    Route::get('/GTIN/verify','verifyGTIN');
    Route::post('/GTIN/bulk','bulkGTIN')->name('bulk');
});