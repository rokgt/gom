<?php
define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
define("FILE_HEADER",ROOT."header.php");//헤더 패스
require_once(ROOT."lib/lib_db.php");// DB관련 라이브러리

$id= ""; //게시글 id
$conn = null;
try{
	
	// id 확인
	// if(isset($_GET["id"])){
	// 	$id= $_GET["id"];
	// }else {
	// 	throw new Exception("parameter ERROR : No id");
	// }
	if(!isset($_GET["id"]) || $_GET["id"]===""){
		throw new Exception("parameter ERROR : No id");
	}
		$id= $_GET["id"];//id 셋팅
		$page = $_GET["page"];
		if(!my_db_conn($conn)){
			throw new Exception("DB ERROR : PDO Instance");

		}
	// 게시글 데이터 조회

	$arr_param=[
		"id"=>$id
	];
	$result = db_select_boards_id($conn,$arr_param);

	// 게시글 조회 예외처리
	if(!$result){
		//게시글 조회 에러
		throw new Exception("DB ERROR : PDO select_id");
		//게시글 조회 count 에러
	} else if(!(count($result)=== 1)){
		throw new Exception("DB ERROR : PDO select_id count,".count($result));
	}
	$item = $result[0];
// var_dump($result);
}catch(Exception $e) {
	echo $e->getMessage();
	exit;
} finally {
	db_destroy_conn($conn);
}

$input_id = $_GET["id"];

?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/mini_board/src/css/common.css">
	<title>상세 페이지</title>
</head>
<body>
	<?php 
	require_once(FILE_HEADER);
	?>
	<table>
		<tr>
			<th>
				글 번호
			</th>
			<td>
				<?php echo $item["id"];?>
			</td>
		</tr>
		<tr>
			<th>
				제목
			</th>
			<td>
			<?php echo $item["title"];?>
			</td>
		</tr>
		<tr>
			<th>
			내용
			</th>
			<td>
				<?php echo $item["content"];?>
			</td>
		</tr>
		<tr>
			<th>
			작성일자
			</th>
			<td>
				<?php echo $item["create_at"];?>
			</td>
		</tr>
	</table>
	<a href="#">수정</a>
	<a href="/mini_board/src/list.php/?page=<?php echo $page;?>">취소</a>
	<a href="#">삭제</a>
</body>
</html>