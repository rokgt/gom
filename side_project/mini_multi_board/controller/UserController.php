<?php

namespace controller;//불러올 곳이 있는곳을 지정해주는것

class UserController extends ParentsController{
//class UserController expends ParentsController{	
	protected function loginGet(){
	//protectes function loginGet(){	
		return "view/login.php";
		//return "
	}

	// 회원가입 페이지 이동
	protected function registGet(){
		return "view/regist"._EXTENSION_PHP;
	}


}