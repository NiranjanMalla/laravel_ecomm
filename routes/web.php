<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'index'])->name('userpage');

Route::get('/redirect',[HomeController::class, 'redirect']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/view_category',[AdminController::class,'view_category'])->name('view_category');
Route::post('/add_category',[AdminController::class,'add_category'])->name('add_category');
Route::get('/delete_category/{id}',[AdminController::class,'delete_category'])->name('delete_category');


Route::get('/view_product',[AdminController::class,'view_product'])->name('view_product');
Route::post('/add_product',[AdminController::class,'add_product'])->name('add_product');

Route::get('/show_product',[AdminController::class,'show_product'])->name('show_product');

Route::get('/product_delete/{id}',[AdminController::class,'product_delete'])->name('product_delete');

Route::get('/product_update/{id}',[AdminController::class,'product_update'])->name('product_update');
Route::post('/product_update_confirm/{id}',[AdminController::class,'product_update_confirm'])->name('product_update_confirm');

Route::get('/product_detail/{id}',[HomeController::class,'product_detail'])->name('product_detail');

Route::post('/add_cart/{id}',[HomeController::class,'add_cart'])->name('add_cart');

