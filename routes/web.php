<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\FilmController; 
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/films', [FilmController::class, 'show'])->name('film_index');
Route::get('/films/{film}', [FilmController::class, 'show'])->name('film_show');

Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add_to_cart');
Route::get('/cart', [CartController::class, 'show'])->name('cart_show');
Route::post('/remove-from-cart', [CartController::class, 'removeFromCart'])->name('remove_from_cart');

require __DIR__.'/auth.php';
