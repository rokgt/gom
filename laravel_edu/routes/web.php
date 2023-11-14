<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

Route::get('/', function () { //::=스태틱
    return view('welcome');
});

// ----------------------------
// 라우트 정의
// ----------------------------
Route::get('/hi',function(){
    return '안녕하세요';
});

//  없는 뷰파일을 리턴할 때
Route::get('/myview', function(){
    return view('myview');
});

// ----------------------------
//HTTP메소드 대응하는 라우터
// 여러 라우터에 해당될 경우 가장 마지막에 정의된것이 실행
//  ---------------------------

// get메소드로 localhost/home으로 접속했을때 home라는 뷰파일을 리턴해주세요

Route::get('/home',function(){
    return view('home');
});

Route::post('/home', function(){
    return '메소드:POST';
});

// PUT 요청
// view의 form에 [@method('PUT')]을 추가
Route::put('/home',function(){
    return '메소드:PUT';
});

// DELETE 요청
Route::delete('/home',function(){
    return '메소드:DELETE';
});

//  ---------------------------
// 라우터에서 파라미터 제어
//  ---------------------------
// 쿼리 스트링에 파라미터가 생성되서
// 요청이 올때 파라미터 획득

Route::get('/query',function(Request $request){
    return $request->id.",".$request->name;
});

// URL 세그먼트로 지정 파라미터 획득  원하는 값만 가져온다
Route::get('/segment/{id}',function($id){
    return '세그먼트 파라미터 : '.$id;
});

//2개 이상의 URL 세그먼트로 지정 파라미터 획득
Route::get('/segment/{id}/{name}',function($id, $name){
    return '세그먼트 파라미터 : '.$id.' , ' .$name;
});

Route::get('/segment2/{id}/{name}', function(Request $request){
    return '세그먼트 파라미터 22222 : '.$request->id.' , ' .$request->name;
});

// URL 세그먼트로 지정 파라미터 획득: 기본값 설정
Route::get('segment3/{id?}', function($id = 'base'){
        return 'segment3 : '.$id;
});

//  ---------------------------
// 라우터에서 매칭 실패시 대체 라우트 정의
//  ---------------------------
Route::fallback(function(){
    return '이상한 URL입니다.';
});

//  ---------------------------
// 라우터의 이름 지정
//  ---------------------------
Route::get('/name', function(){
    return view('name');
});


Route::get('/name/home/php504/root', function(){
    return '이름 없는 라우트';
});

Route::get('/name/home/php504/user', function(){
    return '이름 있는 라우트';
})->name('name.user');

// --------
// 콘트롤러
// --------
// 커맨드로 컨트롤러 생성 :php artisan make:controller 컨트롤러명
use App\Http\Controllers\TestController;

Route::get('/test', [Testcontroller::class, 'index'])->name('test.index');//해당 기능명.액션명

use App\Http\Controllers\TaskController;
// 모든 액션 메소드를 자동으로 생성
//php artisan make:controller 컨트롤러명(TaskController) --resource
Route::resource('/task', TaskController::class);

Route::get('/child1', function(){

    $arr=[
        'name' => '홍길동'
        ,'age' => 130
        ,'gender' => '여자'
    ];
    $arr2=[];

    return view('child1')->with('gender', '1')->with('data',$arr)->with('data2',$arr2);
});

Route::get('/child2', function(){
    return view('child2');
});


//Db관련 실습용
use App\Http\Controllers\BoardController;
Route::get('/boards',[BoardController::class,'index'])->name('board.index');
