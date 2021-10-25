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

//Route::get('/', function () {
//    return view('');
//});

Route::get('/',[\App\Http\Controllers\IndexController::class,'welcome']);
Route::get('/doglist',[\App\Http\Controllers\IndexController::class,'doglist']);
//
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin/index');
})->name('dashboard');
//Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard', function () {
//    return view('admin/index');
//})->name('dashboard');
//Route::middleware(['auth:sanctum', 'verified'])->get('/animal_type', function () {
//    return view('animal_type/index');
//})->name('animal_type');
Route::resource("animal_type",App\Http\Controllers\Animal_TypeController::class);
Route::resource("animal_detail",App\Http\Controllers\Animal_DetailController::class);
Route::resource("testimonials",App\Http\Controllers\Testimonials::class);
