<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BoardController;

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
    return view('mainpage');
});

Route::get('/mainpage',[UserController::class, 'mainpageget'])->name('mainpage.get');
Route::get('/user/login',[UserController::class, 'loginget'])->name('user.login.get');
Route::post('/user/login',[UserController::class, 'loginpost'])->name('user.login.post');
Route::get('/user/registration',[UserController::class, 'registget'])->name('user.regist.get');
Route::post('/user/registration',[UserController::class, 'registpost'])->name('user.regist.post');
Route::get('/user/logout',[UserController::class, 'logoutget'])->name('user.logout.get');


Route::resource('/board',BoardController::class);

