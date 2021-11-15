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
    Route::get('/filter', [App\Http\Controllers\ShopController::class, 'ShopFilter'])->name('shop.filter');

});

//Admin Product All Route
Route::prefix('product')->group(function() {
    Route::get('/add', [App\Http\Controllers\ProductController::class, 'AddProduct'])->name('add.product');
    Route::post('/store', [App\Http\Controllers\ProductController::class, 'StoreProduct'])->name('store.product');
    Route::get('/manage', [App\Http\Controllers\ProductController::class, 'ManageProduct'])->name('manage.product');
    Route::get('/edit/{id}', [App\Http\Controllers\ProductController::class, 'EditProduct'])->name('product.edit');
    Route::post('/data/update/{id}', [App\Http\Controllers\ProductController::class, 'ProductDataUpdate'])->name('product.update');
    Route::post('/image/update', [App\Http\Controllers\ProductController::class, 'MultiImageUpdate'])->name('update.product.image');
    Route::post('/mainImage/update', [App\Http\Controllers\ProductController::class, 'MainImageUpdate'])->name('update.product.mainImage');
    Route::get('/multiimg/delete/{id}', [App\Http\Controllers\ProductController::class, 'MultiImageDelete'])->name('product.multiimg.delete');
    Route::get('/inactive/{id}', [App\Http\Controllers\ProductController::class, 'ProductInactive'])->name('product.inactive');
    Route::get('/active/{id}', [App\Http\Controllers\ProductController::class, 'ProductActive'])->name('product.active');
    Route::get('/delete/{id}', [App\Http\Controllers\ProductController::class, 'ProductDelete'])->name('product.delete');
});

//Admin Shop Route
Route::group(['prefix'=>'admin'],function () {
    Route::resource("/category",App\Http\Controllers\CategoryController::class);
    Route::resource('/orderProduct',App\Http\Controllers\OrderProductController::class);
    Route::get('changeStatus/{status}/{order}',[\App\Http\Controllers\OrderProductController::class,'changeStatus']);

});

//Search Route
Route::post('search', [\App\Http\Controllers\ShopController::class, 'SearchProduct'])->name('product.search');


//Admin Brand All Route
Route::prefix('brand')->group(function (){
    Route::get('/view',[App\Http\Controllers\BrandController::class,'BrandView'])->name('all.brand');
    Route::post('/store',[App\Http\Controllers\BrandController::class,'BrandStore'])->name('brand.store');
    Route::get('/edit/{id}',[App\Http\Controllers\BrandController::class,'BrandEdit']);
    Route::post('/update/{id}',[App\Http\Controllers\BrandController::class,'BrandUpdate']);
    Route::get('/delete/{id}',[App\Http\Controllers\BrandController::class,'BrandDelete'])->name('brand.delete');

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

//Admin Profile All Route
Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
    Route::get('/login', [\App\Http\Controllers\Admin\AdminController::class, 'loginForm']);
    Route::post('/login',[\App\Http\Controllers\Admin\AdminController::class, 'store'])->name('admin.login');
});
Route::get('/admin/logout',[\App\Http\Controllers\Admin\AdminController::class,'destroy'])->name('admin.logout');
Route::get('/admin/profile',[\App\Http\Controllers\Admin\AdminProfileController::class,'AdminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit',[\App\Http\Controllers\Admin\AdminProfileController::class,'AdminProfileEdit'])
    ->name('admin.profile.edit');
Route::post('/admin/profile/store',[\App\Http\Controllers\Admin\AdminProfileController::class,'AdminProfileStore'])
    ->name('admin.profile.store');
Route::get('/admin/change/password',[\App\Http\Controllers\Admin\AdminProfileController::class,'AdminChangePass'])
    ->name('admin.change.password');
Route::post('/update/change/password',[\App\Http\Controllers\Admin\AdminProfileController::class,'UpdateChangePass'])
    ->name('update.change.password');

//End Admin Profile Route

//Default Route
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin/index');
})->name('dashboard');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin/index');
});

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
    Route::resource("blog_animal",App\Http\Controllers\BlogController::class);
});

//Blog Route
Route::get('/blog', [App\Http\Controllers\IndexController::class, 'blog']);
Route::get('/blog-detail/{slug}', [App\Http\Controllers\IndexController::class,'blog_detail']);

Route::get('/tag/{tag}',[App\Http\Controllers\IndexController::class,'tag']);
Route::get('/tag_service/{tag}',[App\Http\Controllers\IndexController::class,'tag_service']);

//Comment Route
Route::post('/comment/{service}', 'App\Http\Controllers\CommentController@store')->name('comment.store');
Route::post('/comment-reply/{comment}', 'App\Http\Controllers\CommentReplyController@store')->name('reply.store');
Route::delete("/comment/{id}",'App\Http\Controllers\CommentController@destroy')->name('comment.destroy');

//Contact
Route::get('/contact_service', [App\Http\Controllers\IndexController::class,'contact_service'])->name('contact_service');
Route::post('/contact_save', [App\Http\Controllers\IndexController::class,'contact_save'])->name('contact_save');
