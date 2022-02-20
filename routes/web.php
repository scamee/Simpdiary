<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FullCalendarController;
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
    return view('top');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/create', [HomeController::class, 'create'])->name('create');

Route::get('/show/{id}', [HomeController::class, 'show'])->name('show');

Route::post('/store', [HomeController::class, 'store'])->name('store');

/* Route::get('full-calender', [FullCalendarController::class, 'index']); */
