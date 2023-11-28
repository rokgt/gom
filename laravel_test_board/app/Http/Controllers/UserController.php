<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\support\facades\Hash;
use Illuminate\support\facades\Validator; 
use Illuminate\support\facades\Auth;

class UserController extends Controller
{
    public function loginget(){
        return view('login');
    }

    public function loginpost(Request $request){
        $validator= Validator::make(
            $request->only('email','password')
            ,[
                'email'=> 'required|email|max:50'
                ,'password'=>'required'
            ]
            );
            if($validator->fails()){
                return view('login')->with('errors',$validator->errors());
            }

            // $result = User::where('email',$request->email)->first();
            // if(!$result || !(Hash::check($request->password,$result->password))){
            //     $errorMsg='잘못쳤다 다시 쳐라';
            //     return view('login')->withErrors($errorMsg);
            // }           

            // Auth::login($result);
            // if(Auth::check()){
            //     session($result->only('id'));
            // }else {
            //     $errorMsg = '인증에러가 발생했습니다';
            //     return view('login')->withErrors($errorMsg);
            // }
            $result=User::where('email',$request->email)->first();
   if(!$result || !(Hash::check($request->password,$result->password))){
      $errorMsg = '아이디와 비밀번호를 다시 확인해 주세요';
      return view('login')->withErrors($errorMsg);
   }

   // 유저인증 작업
   Auth::login($result);
   if(Auth::check()){
      session($result->only('id'));
   }else{
         $errorMsg = '인증에러가 발생했습니다';
         return view('login')->withErrors($errorMsg);      
   }
            
            


        return view('list');
    }


    public function registget(){
        return view('registration');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registpost(Request $request){
        $validator = Validator::make(
            $request->only('email','password', 'passwordchk','name'),
            [
                'email'=>'required|email|max:50' 
                ,'name'=> 'required|regex:/^[a-zA-Z가-힣]+$/|min:2|max:50'
                ,'password'=>'required|same:passwordchk'
            ]
        );

        if($validator->fails()){
              return view('registration')->with('errors',$validator->errors());
        }


        $data= $request->only('email','password','name');
        $data['password'] = Hash::make($data['password']);
        $result = User::create($data);
        return redirect()->route('user.login.get');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    {
        //
    }
}
