<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;

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

Route::group(
    ['middleware' => 'auth'],
    function () {
        Route::get('/show', [HomeController::class, 'index'])->name('home');
        Route::get('/show/{date}', [HomeController::class, 'show'])->name('show');
        Route::get('/create/{date}', [HomeController::class, 'create'])->name('create');
        Route::get('/edit/{date}', [HomeController::class, 'edit'])->name('edit');
        Route::post('/store', [HomeController::class, 'store'])->name('store');
        Route::post('/update', [HomeController::class, 'update'])->name('update');
        Route::post('/delete', [HomeController::class, 'delete'])->name('delete');

        Route::post('/imageUpdate', [ImageController::class, 'imageUpdate'])->name('imageUpdate');
        Route::post('/imageDelete', [ImageController::class, 'imageDelete'])->name('iamgeDelete');
        Route::post('/tagUpdate', [TagController::class, 'tagUpdate'])->name('tagUpdate');

        Route::post('/userUpdate', [UserController::class, 'userUpdate'])->name('userUpdate');
        Route::post('/passwordUpdate', [UserController::class, 'passwordUpdate'])->name('passwordUpdate');
    }
);
