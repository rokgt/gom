<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\Auth;
use Illuminate\support\facades\DB; //db이용하는법
use App\Models\Board;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // * del 231116미들웨어로 이관
        // 로그인 체크
         //if(!Auth::check()){
          //   return redirect()->route('user.login.get');
        // }
        //    *//
        // 게시글 획득

        $result= Board::get();
        return view('list')->with('data',$result);


        // return view('list');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // 작성처리
        $arrInputData = $request->only('b_title','b_content');
        
        $result = Board::create($arrInputData);

        return redirect()->route('board.index');
       
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result=Board::find($id);
        

        // 조회수 올리기
        $result->b_hits++;//조회수 1증가
        $result->timestamps=false;
        // 업데이트 처리
        $result->save();

        return view('detail')->with('data',$result);
        // 게시글 데이터 획득
        // Board::where('b_id',$id)->get();
        
        // return view('detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   try{
            DB::beginTransaction();
            Board::destroy($id);
            //Board::find($id)->delete();
            DB::commit();
        }catch(Exception $e){
        DB::rollback();    
        return redirect()->route('error')->withErroe($e->getMessage());
    }finally{

    }
        
    
    return redirect()->route('board.index');
}
}