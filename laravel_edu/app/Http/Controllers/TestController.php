<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    function index(){
        return view ('test')->with('name','내가 아는 존 중에 제일 쎈 존윅')
                            ->with('data','존윅은 살았을까 죽었을까');// 보내주는 값의 이름,보내주는 값의 밸류
    }
}
