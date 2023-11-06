<?php
namespace router;
//namespace router;
// 사용할 컨트롤러들 지정
use controller\UserController; // 별칭을 줘도 되고 안줘도 된다 별칭주면 별칭으로 바꿔서 적어준다

use controller\BoardController;
// 라우터: 유저의 요청을 분석해서 해당 Controller로 연결해주는 크랠스
class Router {
//class Router{	
	public function __construct(){
	//public function __construct(){
		// URL 규칙
		// 1. 회원정보 관련 URL
		// 		user/[해당기능]
		// 		ex)로그인:호스트/user/login
		// 		ex)회원가입:호스트/user/regist
		// 2.게시판 관련 URL
		// 		board/[해당기능]
		// 		ex)리스트:호스트/board/list
		// 		ex)수정:호스트/board/edit

		$url = $_GET["url"];//접속 url획득
		//$url= $get["url"];
		$method = $_SERVER["REQUEST_METHOD"];//메소드 획득 겟인지 메소든지 확인
		//$method =$_SERVER["REQUEST_METHOD"];		
		if($url === "user/login"){
		//if($url === "user/login"){	
			if($method === "GET"){
			//if($method === "GET"){	
				new UserController("loginGet");
				//new UC ("loginGet");
			//}else{	
			}else {
				 new UserController("loginPost");
			}
		}else if($url === "user/logout"){
		// else if ($url === "user/logout"){	
			if($method === "GET"){
			//if($method=== "GET"){	
				new UserController("logoutGet");
			}else {// new UserController ("logoutGet");

				
			} 

		}else if ($url === "user/regist"){
		//} else if ($url === "user/regist"){				
				if($method === "GET"){
				//if($method === "GET")	
					new UserController("registGet");
					//new UC ("registGet")
			}else {
				
			} 

		}else if($url === "board/list"){
		//}else if($url === "board/list"){
			if($method === "GET"){
			//if($method ==="GET"){

				new BoardController("listGet");
				//new Boardcontroller("listGet");
			}else if($url === "board/add"){
				if($mothod === "GET") {

				}else{
					new BoardController("addPost");
				}
				
		 } 
		}
		
		// 없는 경로일 경우
		echo "이상한url:".$url;
		exit();
	}
}
	