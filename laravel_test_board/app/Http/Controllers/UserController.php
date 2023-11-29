<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\support\facades\Hash;
use Illuminate\support\facades\Validator; 
use Illuminate\support\facades\Auth;
use Illuminate\support\facades\Session;

class UserController extends Controller
{
    public function mainpageget(){
        return view('mainpage');
    }
    public function loginget(){
        
         if(Auth::check()){
         return redirect()->route('board.index');
         }
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

            $result = User::where('email',$request->email)->first();
            if(!$result || !(Hash::check($request->password,$result->password))){
                $errorMsg='잘못쳤다 다시 쳐라';
                return view('login')->withErrors($errorMsg);
            }           

            Auth::login($result);
            if(Auth::check()){
                session($result->only('id'));
            }else {
                $errorMsg = '인증에러!';
                return view('login')->withErrors($errorMsg);
            }
                


        return redirect()->route('board.index');
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
    public function logoutget(){
        session::flush();
        Auth::logout();
        return redirect()->route('user.login.get');
    }
    
}   
