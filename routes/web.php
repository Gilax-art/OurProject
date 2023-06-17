<?php

use App\Http\Controllers\CasesController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\TeamController;
use App\Models\Cases;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [Controller::class, 'index'])->name('/');
Route::get('order', [Controller::class, 'create'])->name('order');
Route::post('order', [Controller::class, 'tstore'])->name('order');

Auth::routes();
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
    Route::redirect('/register', '/admin');

    Route::resource('team', TeamController::class);
    Route::resource('cases', CasesController::class);
    Route::resource('reviews', ReviewsController::class);
    Route::put('orders/{order}/take', [OrdersController::class, 'take'])->name('orders.take');
    Route::put('orders/{order}/decline', [OrdersController::class, 'decline'])->name('orders.decline');
    Route::put('orders/{order}/start', [OrdersController::class, 'start'])->name('orders.start');
    Route::put('orders/{order}/finish', [OrdersController::class, 'finish'])->name('orders.finish');
    Route::resource('orders', OrdersController::class);
});