<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\FilmController; 
use App\Http\Controllers\CartController; 
use App\Http\Controllers\PaymentController; 

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

});

require __DIR__.'/auth.php';
