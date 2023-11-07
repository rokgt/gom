<?php

namespace controller;//불러올 곳이 있는곳을 지정해주는것

use model\UserModel;

class UserController extends ParentsController{
//class UserController expends ParentsController{	
	protected function loginGet(){
	//protectes function loginGet(){	
		return "view/login.php";
		//return "
	}

	// 로그인 처리
	protected function loginPost(){
		// ID, PW 설정(DB에서 사용할 데이터 가공)
		$arrInput=[];
		$arrInput ["u_id"] = $_POST["u_id"];
		$arrInput ["u_pw"] = $this -> encryptionPassword($_POST["u_pw"]);

		$modelUser = new UserModel();
		$resultUserInfo =$modelUser->getUserInfo($arrInput,true);

		// 유저 유무 체크
		if(count($resultUserInfo)===0){
			$this->arrErrorMsg[] = "아이디와 비밀번호를 다시 확인해 주세요.";
			return "view/login.php";
		}

		// 세션에 u_id 저장
		$_SESSION["u_pk"] = $resultUserInfo[0]["id"];
		return "Location: /board/list?b_type=0";
	}
	// 로그아웃 처리
	protected function logoutGet(){
		session_unset();
		session_destroy();
		// 로그인 페이지 리턴
		return "Location: /user/login";
	}

	// 회원가입 페이지 이동
	protected function registGet(){
		return "view/regist"._EXTENSION_PHP;
	}

	// 회원가입 처리

	protected function registPost(){
		$u_id = $_POST["u_id"];
		$u_pw = $_POST["u_pw"];
		$u_pw_chk = $_POST["u_pw_chk"];
		$u_name = $_POST["u_name"];
		$arrAddUserInfo = [
			"u_id"=> $u_id
			,"u_pw"=> $this->encryptionPassword($u_pw)
			,"u_name"=> $u_name
		];

		$patternId = "/^[a-zA-Z0-9]{8,20}$/"; 
		$patternPw= "/^[a-zA-Z0-9!@]{8,20}$/";
		$patternName= "/^[a-zA-Z0-9가-힣]{2,50}$/u"; // 꺽쇠 시작 달러 마침 중괄호 글자수 제한 대괄호안에 방식으로 할거다.

		if(preg_match($patternId, $u_id, $match) === 0){
			// ID에러처리
			$this->arrErrorMsg[] = "아이디는 영어대소문자와 숫자로 8~20자로 입력해 주세요.";
		}
		if(preg_match($patternPw, $u_pw, $match) === 0){
			// PW에러처리
			$this->arrErrorMsg[] = "비밀번호는 영어대소문자와 숫자,!,@로 8~20자로 입력해 주세요.";
		}
		if( $u_pw !== $u_pw_chk){
			// PW에러처리
			$this->arrErrorMsg[] = "비밀번호와 비밀번호확인이 동일하지 않습니다.";
		}
		if(preg_match($patternName, $u_name, $match) === 0){
			// NAME에러처리
			$this->arrErrorMsg[] = "이름는 영어대소문자와 숫자로 2~50자로 입력해 주세요.";
		}
		// TODO:ID중복성체크


		// 유효성 체크 실패
		if(count($this->arrErrorMsg) > 0) {
			return "view/regist.php";
			
		}

		// 인서트 처리
		$userModel = new UserModel();
		$userModel->beginTransaction();
		$result = $userModel->addUserInfo($arrAddUserInfo);

		if($result !== true){
			$userModel->rollBack();
		}else{
			$userModel->commit();
		}
		$userModel->destroy();
		return "Location: /user/login";
	}

	// 비밀번호 암호화
	private function encryptionPassword($pw){
		return base64_encode($pw);
	}
}