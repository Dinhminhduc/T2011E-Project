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
    Route::get('/check_out',function (){
       return view('user.cart.check_out');
    })->name('check_out');
    Route::post('/place_order_product',[App\Http\Controllers\ShopController::class,'place_order_product'])->name('place_order_product');

});

//Admin Shop Route
Route::group(['prefix'=>'admin'],function () {
    Route::get('/product/all',[App\Http\Controllers\ProductController::class,'AllProduct'])->name('all.product');
    Route::post('/product/add',[App\Http\Controllers\ProductController::class,'AddProduct'])->name('add.product');
    Route::get('/product/edit/{id}',[App\Http\Controllers\ProductController::class,'Edit']);
    Route::post('/product/update/{id}',[App\Http\Controllers\ProductController::class,'Update']);
    Route::get('/product/delete/{id}',[App\Http\Controllers\ProductController::class,'Delete']);
    Route::get('/product/restore/{id}',[App\Http\Controllers\ProductController::class,'Restore']);
    Route::get('/product/pdelete/{id}',[App\Http\Controllers\ProductController::class,'PDelete']);
    Route::resource("/category",App\Http\Controllers\CategoryController::class);
    Route::resource('/order',App\Http\Controllers\OrderProductController::class);
    Route::get('changeStatus/{status}/{order}',[\App\Http\Controllers\OrderProductController::class,'changeStatus']);

});

//Admin Brand All Route
Route::prefix('brand')->group(function (){
    Route::get('/view',[App\Http\Controllers\BrandController::class,'BrandView'])->name('all.brand');

});

//Shop Route End

//Service Route
Route::resource("animal_type",App\Http\Controllers\Animal_TypeController::class);
Route::resource("animal_detail",App\Http\Controllers\Animal_DetailController::class);
Route::resource("testimonials",App\Http\Controllers\Testimonials::class);

Route::get('/',[\App\Http\Controllers\IndexController::class,'welcome']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/adoption', [App\Http\Controllers\OrderServiceController::class, 'adoption']);
Route::get('/adoption_detail/{id}', [App\Http\Controllers\OrderServiceController::class, 'adoption_detail'])->name('adoption_detail');
Route::post('/add_adoption/{id}', [App\Http\Controllers\OrderServiceController::class, 'add_adoption'])->name('add_adoption');
Route::get('/adoption_cart', [App\Http\Controllers\OrderServiceController::class, 'adoption_cart'])->name('adoption_cart');

//Cart Service Route
Route::get('/clear_cart',function (){
    \Cart::destroy();
    return redirect('/adoption_cart');
});
Route::post('/update_cart', [App\Http\Controllers\OrderServiceController::class, 'update_cart'])->name('update_cart');
Route::post('/place_order', [App\Http\Controllers\OrderServiceController::class, 'place_order'])->name('place_order');
Route::get('/service_checkout', [App\Http\Controllers\OrderServiceController::class, 'service_checkout'])->name('service_checkout');
Route::post('/order_success', [App\Http\Controllers\OrderServiceController::class,'order_success'])->name('order_success');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::resource("service",App\Http\Controllers\SeviceController::class);
    Route::resource("staff",App\Http\Controllers\StaffController::class);
    Route::resource("service_type",App\Http\Controllers\ServiceTypeController::class);
//    Route::resource("order",App\Http\Controllers\OrderServiceController::class);
    Route::get("changeStatusJson/{status}/{order}",[App\Http\Controllers\OrderServiceController::class,'changeSTT']);
});
//End Service Route

//All Home Route

Route::get('/',[\App\Http\Controllers\IndexController::class,'welcome']);
Route::get('/doglist',[\App\Http\Controllers\IndexController::class,'doglist']);

//Route::middleware(['auth:sanctum', 'verified'])->get('/animal_type', function () {
//    return view('animal_type/index');
//})->name('animal_type');
Route::resource("animal_type",App\Http\Controllers\Animal_TypeController::class);
Route::resource("animal_detail",App\Http\Controllers\Animal_DetailController::class);
Route::resource("testimonials",App\Http\Controllers\Testimonials::class);


//End Home Route


//Default Route
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin/index');


Route::get('/', function () {
   return view('index');
});

Route::get('/',[\App\Http\Controllers\IndexController::class,'welcome']);
Route::get('/doglist',[\App\Http\Controllers\IndexController::class,'doglist']);

Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard', function () {
   return view('admin/index');

})->name('dashboard');


Route::resource("animal_type",App\Http\Controllers\Animal_TypeController::class);
Route::resource("animal_detail",App\Http\Controllers\Animal_DetailController::class);
Route::resource("testimonials",App\Http\Controllers\Testimonials::class);

Route::get('/',[\App\Http\Controllers\IndexController::class,'welcome']);
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/adoption', [App\Http\Controllers\OrderServiceController::class, 'adoption']);
Route::get('/adoption-detail/{slug}', [App\Http\Controllers\OrderServiceController::class, 'adoption_detail'])->name('adoption-detail');
Route::post('/add_adoption/{id}', [App\Http\Controllers\OrderServiceController::class, 'add_adoption'])->name('add_adoption');
Route::get('/adoption_cart', [App\Http\Controllers\OrderServiceController::class, 'adoption_cart'])->name('adoption_cart');


Route::post('/update_cart', [App\Http\Controllers\OrderServiceController::class, 'update_cart'])->name('update_cart');
Route::post('/place_order', [App\Http\Controllers\OrderServiceController::class, 'place_order'])->name('place_order');
Route::get('/service_checkout', [App\Http\Controllers\OrderServiceController::class, 'service_checkout'])->name('service_checkout');
Route::post('/order_success', [App\Http\Controllers\OrderServiceController::class,'order_success'])->name('order_success');


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::resource("service",App\Http\Controllers\SeviceController::class);
    Route::resource("staff",App\Http\Controllers\StaffController::class);
    Route::resource("service_type",App\Http\Controllers\ServiceTypeController::class);
    Route::resource("order",App\Http\Controllers\OrderServiceController::class);
});
