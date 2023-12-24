<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::resource('products', ProductController::class);
$post = 'Pots and Pans Set Nonstick';
$slug = Str::slug($post);
// dd($slug);

Route::get("/products/{$slug}", [ProductController::class, 'show'])->name('products.buy');
Route::post('/buy', [ProductController::class, 'buy'])->name('products.buy');
