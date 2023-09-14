<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CartController;

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

//Languages switching
Route::get('lang/{locale}', function($locale) {
    App::setLocale($locale);
    //storing the locale in session to get it back in the middleware
    session()->put('locale', $locale);
    return redirect()->back();
});

Route::get('/', [HomeController::class, 'index'])->name("home");
Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name("login");
Route::get('/logout', [LoginController::class, 'logout'])->name("logout");
Route::match(['get', 'post'], '/register', [LoginController::class, 'register'])->name("register");
Route::get('/set-password', [LoginController::class, 'setPassword'])->name("set-new-password");
Route::get('/forget-password', [LoginController::class, 'forgetPassword'])->name("forget-password");
Route::get('/account', [LoginController::class, 'getProfile'])->name("account")->middleware("auth.customer");
Route::get('/detail-history', [LoginController::class, 'detailHistory'])->name("detail-history");
Route::get('/update-account', [LoginController::class, 'updateAccount'])->name("update-account");
Route::get('/check-mail', [LoginController::class, 'checkMail'])->name("check-mail");
Route::get('/waiting-approve', [LoginController::class, 'waitingApprove'])->name("waiting-approve");
Route::get('/plans/{id}', [ProductController::class, 'detailProduct'])->name("plans.show");
Route::get('/contact', [PageController::class, 'contact'])->name("contact");
Route::get('/about', [PageController::class, 'about'])->name("about");
Route::get('/esim-support-list', [PageController::class, 'supportList'])->name("esim-support-list");
Route::get('/setup-esim', [PageController::class, 'setupEsim'])->name("setup-esim");
Route::match(['get', 'post'], '/checkout', [CartController::class, 'checkout'])->name("checkout");
Route::match(['post', 'get'], '/billing-detail', [CartController::class, 'billingDetail'])->name("billing-detail");
Route::get('/add_to_cart', [CartController::class, 'addToCart']);
Route::get('/update_cart', [CartController::class, 'updateCart']);
Route::get('/remove_cart', [CartController::class, 'removeCart']);
Route::get('/remove_order_detail', [CartController::class, 'removeOrderDetail']);
Route::get('/get_cart', [CartController::class, 'getCart']);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
