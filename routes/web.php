<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WidgetController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\MailSendController;

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
        Route::get('/show/partner/{date}', [HomeController::class, 'partnerShow'])->name('partnerShow');
        Route::get('/create/{date}', [HomeController::class, 'create'])->name('create');
        Route::get('/edit/{date}', [HomeController::class, 'edit'])->name('edit');
        Route::post('/store', [HomeController::class, 'store'])->name('store');
        Route::post('/update', [HomeController::class, 'update'])->name('update');
        Route::post('/delete', [HomeController::class, 'delete'])->name('delete');

        Route::post('/imageUpdate', [ImageController::class, 'imageUpdate'])->name('imageUpdate');
        Route::post('/imageDelete', [ImageController::class, 'imageDelete'])->name('iamgeDelete');
        Route::post('/widget1Update', [WidgetController::class, 'widget1Update'])->name('widget1Update');
        Route::post('/widget2Update', [WidgetController::class, 'widget2Update'])->name('widget2Update');

        Route::post('/userUpdate', [UserController::class, 'userUpdate'])->name('userUpdate');
        Route::post('/themeUpdate', [ThemeController::class, 'update'])->name('themeUpdate');
        Route::post('/passwordUpdate', [UserController::class, 'passwordUpdate'])->name('passwordUpdate');

        Route::post('/mail', [MailSendController::class, 'send']);
        Route::get('/invitation/{token}', [MailSendController::class, 'invitation']);
    }
);
