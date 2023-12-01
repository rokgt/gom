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
Route::get('/freelist',[BoardController::class,'freelistget'])->name('freelist.get');
Route::get('/questionlist',[BoardController::class,'questionlistget'])->name('questionlist.get');
Route::get('/mainpage',[UserController::class, 'mainpageget'])->name('mainpage.get');
Route::get('/user/login',[UserController::class, 'loginget'])->name('user.login.get');
Route::post('/user/login',[UserController::class, 'loginpost'])->name('user.login.post');
Route::get('/user/registration',[UserController::class, 'registget'])->name('user.regist.get');
Route::post('/user/registration',[UserController::class, 'registpost'])->name('user.regist.post');
Route::get('/user/logout',[UserController::class, 'logoutget'])->name('user.logout.get');


Route::middleware('auth')->resource('/board',BoardController::class);
// GET|HEAD        board ..................................... board.index › BoardController@index  
// POST            board ..................................... board.store › BoardController@store  
// GET|HEAD        board/create .............................. board.create › BoardController@create  
// GET|HEAD        board/{board} ............................. board.show › BoardController@show  
// PUT|PATCH       board/{board} ............................. board.update › BoardController@update  
// DELETE          board/{board} ............................. board.destroy › BoardController@destroy  
// GET|HEAD        board/{board}/edit ........................ board.edit › BoardController@edit  

