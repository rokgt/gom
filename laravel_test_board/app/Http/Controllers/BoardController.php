<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\Auth;
use Illuminate\support\facades\DB;
use App\Models\Board;

class BoardController extends Controller
{   
    public function freelistget(){
        $result=Board::get();
        return view('freelist')->with('data',$result);
    }
    public function questionlistget(){
        return view('questionlist');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::check()){
            return redirect()->route('user.login.get');
        }

        $result= Board::get();
        
        return view('list')->with('data',$result);
            
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arrData=$request->only('u_title','u_content');
        if($request->hasFile('img')){
           $imagePath = $request->file('img')->store('public/img');
           $arrData['image_path']=$imagePath;
        }
        $result=Board::create($arrData);
        return redirect()->route('freelist.get');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = Board::find($id);
        return view('detail')->with('data',$result);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result=Board::find($id);
        return view('edit')->with('data',$result);
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
        $result = Board::find($id);
        $result->update($request->only('u_title','u_content'));
        return redirect()-> route('board.show',['board'=> $result->u_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Board::find($id)->delete();
        Board::destroy($id);
        return redirect()-> route('freelist.get');

    }
}
