<?php

use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeUserController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\PayUserController;
use App\Http\Controllers\CartUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\userListController;

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

Route::get('admin-login',[userListController::class, 'login_admin'])->name('userList.admin.login');
Route::post('admin-login',[userListController::class, 'post_login_admin'])->name('userList.admin.postLogin');

// Route::get('send-mail',[userListController::class, 'send_mail'])->name('userList.admin.sendMail');

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('logout',[userListController::class, 'logout_admin'])->name('userList.admin.logout');
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('profile', function () {
        return view('Admin.Pages.User-management.profile');
    })->name('admin.profile');

    Route::resource('category', CategoryController::class);
    Route::get('category-search', [CategoryController::class, 'search'])->name('category.search');
    Route::resource('product', ProductController::class);
    Route::get('product-search', [ProductController::class, 'search'])->name('product.search');
    Route::resource('brand', BrandController::class);
    Route::get('brand-search', [BrandController::class, 'search'])->name('brand.search');
    Route::resource('userList', userListController::class);
    Route::get('user-list-search', [userListController::class, 'search'])->name('userList.search');
    Route::resource('order', OrderController::class);
});



Route::prefix('')->group(function () {
    Route::get('/', [HomeUserController::class, 'index'])->name('user.home');
    Route::get('/search', [HomeUserController::class, 'search'])->name('user.search');
    Route::get('/products/{type}/{name}', [HomeUserController::class,'product'])->name('category');
    Route::get('/products-sort', [HomeUserController::class,'sortProduct'])->name('sortProduct');
    Route::get('/privacy-policy', [HomeUserController::class,'privacy'])->name('user.privacy');

    Route::get('/detail/{slug}', [HomeUserController::class, 'detail'])->name('user.detail');

    Route::get('/thanh-toan', [HomeUserController::class, 'pay'])->name('user.pay');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');

    Route::get('/contact', [HomeUserController::class, 'contact'])->name('user.contact');
    Route::get('/cart', [CartUserController::class, 'cart'])->name('user.cart');
    Route::get('/menu', [CategoryController::class, 'showMenu'])->name('menu.show');

    Route::post('/add-cart',[CartUserController::class, 'addcart'])->name('user.cart.add');

    Route::patch('/user/cart/update/{id}', [CartUserController::class, 'updateQuantity'])->name('user.cart.update');
    Route::delete('/user/cart/remove/{id}', [CartUserController::class, 'removeItem'])->name('user.cart.remove');
    Route::get('/email-register', [HomeUserController::class,'emailRegister']);
    Route::get('/login', [LoginUserController::class, 'login'])->name('user.login');
    Route::post('/login', [LoginUserController::class, 'postLogin']);

    Route::get('/register', [LoginUserController::class, 'register'])->name('user.register');
    Route::post('/register', [LoginUserController::class, 'postRegister']);

    Route::get('/project', [LoginUserController::class, 'project'])->name('user.project');
    Route::get('/logout', [LoginUserController::class, 'logout'])->name('user.logout');
    Route::post('/online-checkout', [PayUserController::class, 'momo_payments'])->name('pay.checkout');

});
