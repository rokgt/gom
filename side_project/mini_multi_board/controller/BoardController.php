<?php

namespace controller;

use model\BoardModel;

class BoardController extends ParentsController{
	protected $arrBoardInfo;
	protected $titleBoardName;
	protected $boardType;

	// 게시판 리스트 페이지
	protected function listGet(){

		$b_type = isset($_GET["b_type"]) ? $_GET["b_type"] : "0";

		$arrBoardInfo = [
			"b_type"=>$b_type
		];

		//페이지의 제목 셋팅
		foreach($this->arrBoardNameInfo as $item){
			if($item["b_type"] === $b_type){
				$this->titleBoardName = $item["b_name"];
				$this->boardType = $item["b_type"];
				break;
			}
		}

		// 모델 인스턴스
		$boardModel = new BoardModel();

		// board리스트 획득
		$this->arrBoardInfo = $boardModel->getBoardList($arrBoardInfo);

		//데이터 가공처리
		// $this->arrBoardInfo["b_content"] = mb_substr($this->arrBoard["b_content"], 0, 10)."...";
		// $this->arrBoardInfo["b_img"] = isset($this->arrBoardInfo["b_img"]) ? _PATH_USERIMG.$this->arrBoardInfo["b_img"] : "";
		// $boardModel->destroy();

		return "view/list.php";
	}

	// 글 작성
	protected function addPost() {
		// 작성 데이터 생성
		$b_type = $_POST["b_type"];
		$b_title = $_POST["b_title"];
		$b_content = $_POST["b_content"];
		$u_pk = $_SESSION["u_pk"];
		$b_img = $_FILES["b_img"]["name"];

		$arrAddBoardInfo = [
			"b_type"=>$b_type
			,"b_title"=>$b_title
			,"b_content"=>$b_content
			,"u_pk"=>$u_pk
			,"b_img"=> $b_img

		];

		// 이미지 파일 저장

		move_uploaded_file($_FILES["b_img"]["tmp_name"], _PATH_USERIMG.$b_img);
		
		// 인서트 처리
		$boardModel = new BoardModel();
		$boardModel->beginTransaction();
		$result= $boardModel->addBoard($arrAddBoardInfo);
		if($result !== true){
			$boardModel -> rollback();
		}else {
			$boardModel-> commit();
		}
		// 모델 파기
		$boardModel->destroy();

		return "Location: /board/list?b_type=".$b_type;
	}

	//상세정보 API
	protected function detailGet(){
		$id= $_GET["id"];

		$arrBoardDetailInfo = [
			"id" => $id
		];
		$boardModel= new BoardModel();
		$result = $boardModel->getBoardDetail($arrBoardDetailInfo);
		// 이미지 패스 재설정
		$result[0]["b_img"] = "/"._PATH_USERIMG.$result[0]["b_img"];

		// 작성 유저 플래그 설정
		$result[0]["uflg"] = $result[0]["u_pk"] === $_SESSION["u_pk"] ? "1" : "0";

		// 레스폰스 데이터 작성
		$arrTmp = [
			"errflg" => "0"
			,"msg" => ""
			,"data" => $result[0]
			
		];
		$response = json_encode($arrTmp);// 제이슨 형태로 바꾼다

		// response처리
		header('Content-type: application/json'); // 오는형식이 json이라고 알려준다
		echo $response;
		exit();
	}
	//삭제처리API
	protected function removeGet(){				
		$errFlg="0";
		$errMsg="";
		$arrDeleteBoardInfo = [
			"id"=> $_GET['id']
			,"u_pk" => $_SESSION["u_pk"]
		];

		$boardModel = new BoardModel();
		$boardModel->beginTransaction();
		$result= $boardModel->removeBoardCard($arrDeleteBoardInfo);
		if($result !== 1){
			$errFlg="1";
			$errMsg="삭제처리이상";
			$boardModel->rollBack();
		}else {
			$boardModel->commit();
		}
		$boardModel->destroy();
		$arrTmp = [
			"errflg" =>$errFlg
			,"msg" => $errMsg
			,"id"=> $arrDeleteBoardInfo["id"]
			
		];
		$response = json_encode($arrTmp);

		header('Content-type: application/json'); // 오는형식이 json이라고 알려준다
		echo $response;
		exit();
		
	}


}