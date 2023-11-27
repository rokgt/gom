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
    return view('login');
});
Route::get('/user/login',[UserController::class, 'loginget'])->name('user.login.get');
Route::post('/user/login',[UserController::class, 'loginpost'])->name('user.login.post');
Route::get('/user/registeration',[UserController::class, 'registeget'])->name('user.registe.get');
Route::post('/user/registeration',[UserController::class, 'registepost'])->name('user.registe.post');

