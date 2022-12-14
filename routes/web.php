<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/redirect', [HomeController::class, 'redirect']);

Route::get('/view_category', [AdminController::class, 'view_category']);

Route::post('/add_category', [AdminController::class, 'add_category']);

Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);

Route::get('/view_product', [AdminController::class, 'view_product']);

Route::post('/add_product', [AdminController::class, 'add_product']);

Route::get('/show_product', [AdminController::class, 'show_product']);

Route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);

Route::get('/update_product/{id}', [AdminController::class, 'update_product']);

Route::post('/update_product_confirm/{id}', [AdminController::class, 'update_product_confirm']);

//buttons card -> products
Route::get('/product_details/{id}', [HomeController::class, 'product_details']);

// button add cart
Route::post('/add_cart/{id}', [HomeController::class, 'add_cart']);

// showsection cart
Route::get('/show_cart', [HomeController::class, 'show_cart']);

// delete item table
Route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart']);

//pay cash method
Route::get('/cash_order', [HomeController::class, 'cash_order']);

//pay card method
Route::get('/stripe/{totalprice}', [HomeController::class, 'stripe']);
Route::post('stripe', [HomeController::class, 'stripePost'])->name('stripe.post');

// display module order
Route::get('/order', [AdminController::class, 'order']);
Route::get('/delivered/{id}', [AdminController::class, 'delivered']);

// btn print PDF
Route::get('/print_pdf/{id}', [AdminController::class, 'print_pdf']);

// search input
Route::get('/search', [AdminController::class, 'searchdata']);

Route::get('/show_order', [HomeController::class, 'show_order']);

Route::get('/cancel_order/{id}', [HomeController::class, 'cancel_order']);

// section comment
Route::post('/add_comment', [HomeController::class, 'add_comment']);

Route::post('/add_reply', [HomeController::class, 'add_reply']);

// search
Route::get('/product_search', [HomeController::class, 'product_search']);
Route::get('/search_product', [HomeController::class, 'search_product']);


Route::get('/products', [HomeController::class, 'product']);

require __DIR__.'/auth.php';
