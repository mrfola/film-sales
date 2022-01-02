<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\FilmController; 
use App\Http\Controllers\CartController; 
use App\Http\Controllers\PaymentController; 
use App\Http\Controllers\Auth\RegisteredUserController; 
use App\Http\Controllers\OrderController; 
use App\Http\Controllers\Admin\AdminHomeController; 
use App\Http\Controllers\Admin\AdminFilmController; 

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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {

Route::get('/user', [RegisteredUserController::class, 'show'])->name('user_show');
Route::patch('/user', [RegisteredUserController::class, 'update'])->name('user_update');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/films', [FilmController::class, 'show'])->name('film_index');
Route::get('/films/{film}', [FilmController::class, 'show'])->name('film_show');

Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add_to_cart');
Route::get('/cart', [CartController::class, 'show'])->name('cart_show');
Route::post('/remove-from-cart', [CartController::class, 'removeFromCart'])->name('remove_from_cart');

Route::post('/checkout', [PaymentController::class, 'show'])->name('checkout');
// The route that the button calls to initialize payment
Route::post('/pay', [PaymentController::class, 'initialize'])->name('pay');
// The callback url after a payment
Route::get('/rave/callback', [PaymentController::class, 'callback'])->name('callback');

Route::get('/orders', [OrderController::class, 'index'])->name('orders_index');

});



//admin routes
Route::middleware('admin_auth:admin')->group(function () 
{
    
Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin_home');

Route::get('/admin/films', [AdminFilmController::class, 'create'])->name('film_create');
Route::post('/admin/films', [AdminFilmController::class, 'store'])->name('film_store');
Route::get('/admin/films/{film}', [AdminFilmController::class, 'show'])->name('film_show');
Route::patch('/admin/films/{film}', [AdminFilmController::class, 'update'])->name('film_update');
Route::delete('/admin/films/{film}', [AdminFilmController::class, 'destroy'])->name('film_delete');

Route::get('/admin/report', [AdminFilmController::class, 'report'])->name('film_report');

});

require __DIR__.'/auth.php';
require __DIR__.'/admin_auth.php';
