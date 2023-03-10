<?php


use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\WishListController;
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

// default route
// Route::get('/', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');



// login Routes

// Route::get('/redirect',[MainController::class,'dashboard']);


// Admin Routes
Route::group(['name'=>'admin.', 'prefix'=>'adminpanel','middleware'=>['auth','verified','admin']],function(){

    // Featured routes
    Route::get('/',[HomeController::class, 'dashboard']);
    Route::resource('/users', UserController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/brand', BrandController::class);
    Route::resource('/product', ProductController::class);
    Route::resource('/offer', OfferController::class);
    Route::resource('/order', OrderController::class);
    Route::resource('/setting', SettingController::class);

    // Admin Profile route
    Route::get('/profile' , [ProfileController::class ,'index'])->name('profile');
});


// User Routes
Route::group(['name'=>'user.','middleware'=>['auth','verified']],function(){

    // Featured routes
    Route::get('/',[HomeController::class, 'index']);
    Route::get('/shop',[HomeController::class, 'shop'])->name('shop');
    Route::get('/dashboard',[HomeController::class, 'user_dashboard'])->name('dashboard');
    Route::get('/orders',[HomeController::class, 'order'])->name('order');
    Route::get('/userwishlist',[HomeController::class, 'wishlist'])->name('userwishlist');
    Route::get('/view-cart' , [CartController::class , 'index'])->name('user.view-cart');
    Route::get('wishlist' , [WishListController::class , 'index'])->name('user.wishlist');
    Route::get('/checkout' , [CartController::class , 'checkout'])->name('user.checkout');
    // Route::get('/thankyou' , [CartController::class , 'thankyou'])->name('user.thankyou');
    Route::get('/cancel' , [CartController::class , 'cancel'])->name('user.cancel');
    Route::post('/place-order' , [CartController::class , 'saveOrder'])->name('saveorder');
    Route::get('add-cart/{id}/{quantity?}' , [CartController::class , 'add'])->name('add-cart');
    Route::get('change/{id}/{quantity?}', [CartController::class , 'ChangeQty'])->name('cart.quantity');
    Route::get('remove/{id}', [CartController::class , 'remove'])->name('product.remove');
    Route::get('add-wishlist/{id}' , [WishListController::class , 'create'])->name('add-wishlist');
    Route::get('wishlist/remove/{id}' , [WishlistController::class , 'remove'])->name('wishlist.remove');


});

Route::get('/thankyou' , [CartController::class , 'thankyou'])->name('user.thankyou');
Route::get('/search',[HomeController::class , 'search'])->name('search');
Route::get('/filter',[HomeController::class , 'filter'])->name('filter');

require __DIR__.'/auth.php';
