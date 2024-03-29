<?php

use App\Http\Controllers\CasesController;
use App\Http\Controllers\Main\CaseController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Main\IndexController;
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

Route::get('/', [IndexController::class, 'index'])->name('/');

Route::get('lang/{locale}', [LanguageController::class, 'setlanguage'])->name('lang');

//Route::get('order', [IndexController::class, 'create'])->name('order');
Route::post('order', [IndexController::class, 'tstore'])->name('order');

Route::prefix('cases')->group(function () {
    Route::get('/', [CaseController::class, 'index'])->name('cases');
    Route::get('{url}', [CaseController::class, 'case'])->name('case');
});

Auth::routes();
Route::redirect('/register', '/admin');
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

    Route::resource('team', TeamController::class);
    Route::resource('cases', CasesController::class);
    Route::resource('reviews', ReviewsController::class);
    Route::put('orders/{order}/take', [OrdersController::class, 'take'])->name('orders.take');
    Route::put('orders/{order}/decline', [OrdersController::class, 'decline'])->name('orders.decline');
    Route::put('orders/{order}/start', [OrdersController::class, 'start'])->name('orders.start');
    Route::put('orders/{order}/finish', [OrdersController::class, 'finish'])->name('orders.finish');
    Route::resource('orders', OrdersController::class);
});