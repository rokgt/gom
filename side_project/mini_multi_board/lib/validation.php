<?php

namespace lib;

class Validation {

	private static $arrErrorMsg = [];//바리데이션용 에러메세지 저장 프로퍼티
	// getter(게터): 에러메세지 반환용 메소드
	public static function getArrErrorMsg() {
		return self::$arrErrorMsg;
	}

	// setter : 에러 메세지 저장용 메소드
	public static function setArrErrorMsg($msg){
		self::$arrErrorMsg[] = $msg;
	}

	//유효성 체크 메소드
	public static function userChk(array $inputData) : bool {
		
		$patternId = "/^[a-zA-Z0-9]{8,20}$/"; 
		$patternPw= "/^[a-zA-Z0-9!@]{8,20}$/";
		$patternName= "/^[a-zA-Z0-9가-힣]{2,50}$/u"; // 꺽쇠 시작 달러 마침 중괄호 글자수 제한 대괄호안에 방식으로 할거다.

		// 아이디 체크
		if(array_key_exists("u_id", $inputData)){

			if(preg_match($patternId, $inputData["u_id"], $match) === 0){
			// ID에러처리
			$msg="아이디는 영어대소문자와 숫자로 8~20자로 입력해 주세요.";
			self::setArrErrorMsg($msg);
			}
		}

		// 비밀번호 체크
		if(array_key_exists("u_pw", $inputData)){
			if(preg_match($patternPw, $inputData["u_pw"], $match) === 0){
			// PW에러처리
			$msg="비밀번호는 영어대소문자와 숫자,!,@로 8~20자로 입력해 주세요.";
			self::setArrErrorMsg($msg); 
			}
			
		}
		// 비밀번호 확인 체크
		if(array_key_exists("u_pw_chk", $inputData)){
			if( $inputData["u_pw"] !== $inputData["u_pw_chk"]){
				// PW 확인 에러처리
				$msg="비밀번호와 비밀번호확인이 동일하지 않습니다.";
				self::setArrErrorMsg($msg); 
			}
		}	
		// 이름 체크
		if(array_key_exists("u_name", $inputData)){
			if(preg_match($patternName, $inputData["u_name"], $match) === 0){
			// NAME에러처리
			$msg= "이름는 영어대소문자와 숫자로 2~50자로 입력해 주세요.";
			self::setArrErrorMsg($msg);  
			}
		}	

		// 리턴 처리
		if(count(self::$arrErrorMsg)>0) {
			return false;
		}

		return true;

	}
}

// $arr=[
// 	"u_id" => "admin1111"
// 	,"u_pw" => "1234567811"
// 	,"u_pw_chk"=> "1234567811"
// 	,"u_name"=>"홍길동"
// ];

// var_dump(Validation::userChk($arr));

// var_dump(Validation::getArrErrorMsg());