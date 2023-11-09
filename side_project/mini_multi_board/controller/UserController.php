<?php

namespace controller;//불러올 곳이 있는곳을 지정해주는것

use model\UserModel;
use lib\Validation;
class UserController extends ParentsController{
//class UserController expends ParentsController{	
	protected function loginGet(){
	//protectes function loginGet(){	
		return "view/login.php";
		//return "
	}

	// 로그인 처리
	protected function loginPost(){
		// 유효성 체크
		$inputData=[
			"u_id" => $_POST["u_id"]
			,"u_pw" => $_POST["u_pw"]
		];
		if(!Validation::userChk($inputData)) {
			$this->arrErrorMsg = Validation::getArrErrorMsg();
			return "view/login.php";
			
		 }
		// ID, PW 설정(DB에서 사용할 데이터 가공)
		$arrInput=[];
		$arrInput ["u_id"] = $_POST["u_id"];
		$arrInput ["u_pw"] = $this -> encryptionPassword($_POST["u_pw"]);
		





		// 유저정보 획득
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
		$inputData=[
			"u_id" => $_POST["u_id"]
			,"u_pw" => $_POST["u_pw"]
			,"u_pw_chk" => $_POST["u_pw_chk"]
			,"u_name" => $_POST["u_name"]
		];
		// var_dump($inputData);
		
		$arrAddUserInfo = [
			"u_id"=> $_POST["u_id"]
			,"u_pw"=> $this->encryptionPassword($_POST["u_pw"])
			,"u_name"=> $_POST["u_name"]
		];
		// var_dump($arrAddUserInfo);
	

		// TODO:ID중복성체크


		// 유효성 체크 실패
		if(!Validation::userChk($inputData)) {
			$this->arrErrorMsg = Validation::getArrErrorMsg();
			return "view/regist.php";
			
		 }
		//  var_dump($inputData);

		

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

	// 아이디체크
	// 내가 한것
	// protected function idChkGet(){
	// 	$u_id= $_GET["u_id"];

	// 	$arrUserIdChk = [
	// 		"u_id" => $u_id
	// 	];

	// 	$userModel= new UserModel();
	// 	$result = $userModel->getUserIdChk($u_id);

	// 	// if($result ===  )
	// 	// 레스폰스 데이터 작성
	// 	$arrTmp = [
	// 		"errflg" =>"0"
	// 		,"msg" => ""
	// 		,"data"=>
	// 			$result[0]
			
	// 	];
	// 	$response = json_encode($arrTmp);// 제이슨 형태로 바꾼다

	// 	// response처리
	// 	header('Content-type: application/json'); // 오는형식이 json이라고 알려준다
	// 	echo $response;
	// 	exit();
	// }

	// 선생님이 하신것
	protected function idChkPost(){
		$errorFlg="0";
		$errorMsg="";
		$inputData = [
			"u_id"=> $_POST["u_id"]
		];
		// var_dump($inputData);
		// exit;
		// 유효성체크
		if(!Validation::userChk($inputData)) {
			$errorFlg="1";
			$errorMsg = Validation::getArrErrorMsg()[0];
					
		 }

		 $userModel = new UserModel();
		 $result = $userModel->getUserInfo($inputData);
		 $userModel->destroy();

		 if(count($result) > 0){
			$errorFlg = "1";
			$errorMsg = "중복된 아이디입니다.";
		 }
		 
		//response처리
		$response=[
			"errflg" => $errorFlg
			,"msg" => $errorMsg
		];
		 header('Content-type: application/json');
		echo json_encode($response);
		exit();
	}



	

	// 비밀번호 암호화
	private function encryptionPassword($pw){
		return base64_encode($pw);
	}
}