<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Controller;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/product-details/{id}', [HomeController::class, 'product_details']);
Route::permanentRedirect('/product-details/', '/');// redirect to home if blank product id 
Route::get('/about', [HomeController::class, 'about']);
Route::match(['get', 'post'], '/contact-us', [HomeController::class, 'contact_us']);
Route::match(['get', 'post'], '/login', [HomeController::class, 'login']);
Route::match(['get', 'post'], '/signup', [HomeController::class, 'signup']);
