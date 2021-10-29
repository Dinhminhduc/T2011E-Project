<?php

use Illuminate\Support\Facades\Route;

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

//All Shop Route
Route::group(['prefix'=>'shop'],function (){
    Route::get('/all',[App\Http\Controllers\ShopController::class,'allShop'])->name('all.shop');
    Route::get('/detail/{id}',[App\Http\Controllers\ShopController::class,'detailShop'])->name('detail.shop');
    Route::post('/add_product/{pid}',[App\Http\Controllers\ShopController::class,'detailProduct'])->name('add_product');
    Route::get('/cart',[App\Http\Controllers\ShopController::class,'cart'])->name('cart');
    Route::get('/clear_cart',[App\Http\Controllers\ShopController::class,'clear'])->name('clear_cart');
    Route::post('/update_cart',[App\Http\Controllers\ShopController::class,'update'])->name('update_cart');

});

Route::group(['prefix'=>'admin'],function () {
    Route::get('/product/all',[App\Http\Controllers\ProductController::class,'AllProduct'])->name('all.product');
    Route::post('/product/add',[App\Http\Controllers\ProductController::class,'AddProduct'])->name('add.product');
    Route::get('/product/edit/{id}',[App\Http\Controllers\ProductController::class,'Edit']);
    Route::post('/product/update/{id}',[App\Http\Controllers\ProductController::class,'Update']);
    Route::get('/product/delete/{id}',[App\Http\Controllers\ProductController::class,'Delete']);
    Route::get('/product/restore/{id}',[App\Http\Controllers\ProductController::class,'Restore']);
    Route::get('/product/pdelete/{id}',[App\Http\Controllers\ProductController::class,'PDelete']);
    Route::resource('/category',App\Http\Controllers\CategoryController::class);
});


//All Home Route
Route::get('/',[\App\Http\Controllers\IndexController::class,'welcome']);
Route::get('/doglist',[\App\Http\Controllers\IndexController::class,'doglist']);

//Route::middleware(['auth:sanctum', 'verified'])->get('/animal_type', function () {
//    return view('animal_type/index');
//})->name('animal_type');
Route::resource("animal_type",App\Http\Controllers\Animal_TypeController::class);
Route::resource("animal_detail",App\Http\Controllers\Animal_DetailController::class);
Route::resource("testimonials",App\Http\Controllers\Testimonials::class);

//Default Route
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin/index');
})->name('dashboard');
