<?php

namespace controller;

class ParentsController {
	protected $controllerChkUrl ; //헤더 표시 제어용 문자열
	protected $arrErrorMsg=[];//화면에 표시할 에러메세지 리스트
	// 비로그인 시 접속 불가능한URL리스트
	private $arrNeedAuth = [
		"board/list"
	];
	public function __construct($action){
		// 뷰관련 체크 접속 url셋팅
		$this->controllerChkUrl = $_GET["url"];

		//세션 시작
		if(!isset($_SESSION)){
			session_start();
		}
		
		// 유저 로그인 및 권한 체크

		$this->chkAuthorization();

		// controller 메소드 호출
		$resultAction = $this->$action();
		
		//view 호출
		$this->callview($resultAction);
		exit();
	}

	// 유저 권한 체크용 메소드
	private function chkAuthorization(){
		$url = $_GET["url"];
		if(!isset($_SESSION["u_id"]) && in_array($url ,$this->arrNeedAuth) ) {
				header("Location: /user/login");
				exit();
		}else{}
	}
	// 뷰 호출용 메소드
	private function callview($path){
		//  view/list.php
		//  Location: /board/list
		if( strpos($path, "Location:")===0){
			header($path);
			exit();
		}else{

		require_once($path);
		}	
	}
}