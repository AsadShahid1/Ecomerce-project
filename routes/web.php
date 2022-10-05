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
});

Route::get('/search',[HomeController::class , 'search'])->name('search');
Route::get('/filter',[HomeController::class , 'filter'])->name('filter');

require __DIR__.'/auth.php';
