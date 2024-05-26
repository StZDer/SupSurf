<?php

use App\Http\Controllers\PointController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/statistics/history', [App\Http\Controllers\StatisticsController::class, 'history'])->name('statistics.history');
Route::get('/point/{point}/stocks/{id}', [ProductController::class, 'stock'])->name('point.product.stock');
Route::get('/point/{point}/pointStock/{id}', [ProductController::class, 'pointStock'])->name('point.stock');
Route::get('/stock/{stock}/activ', [StockController::class, 'activ'])->name('stock.activ');
Route::get('/rent/{rent}/storeRent', [RentController::class, 'storeRent'])->name('rent.storeRent');
Route::get('/rent/{rent}/activ', [RentController::class, 'activ'])->name('rent.activ');
Route::get('/rent/{rent}/storeStock', [RentController::class, 'storeStock'])->name('rent.storeStock');
Route::PUT('/user/{user}/updatePoint', [UserController::class, 'updatePoint'])->name('user.updatePoint');

Route::resources([
    'stock' => StockController::class,
    'rent' => RentController::class,
    'statistics' => StatisticsController::class,
    'point' => PointController::class,
    'user' => UserController::class,
    'product' => ProductController::class,
]);
