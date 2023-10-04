<?php
define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
define("FILE_HEADER",ROOT."header.php");//헤더 패스
require_once(ROOT."lib/lib_db.php");//DB관련 라이브러리

// POST로 request가 왔을 때 처리
$http_method=$_SERVER["REQUEST_METHOD"];
if($http_method === "POST"){
	try{$arr_post = $_POST;
		$conn = null;//DB connection변수
		//DB 접속
		if(!my_db_conn($conn)){
			//DB Instance 에러
			throw new Exception("DB Error : PDO Instance");
		}
		$conn->beginTransaction();
			//insert
		if(!db_insert_boards($conn,$arr_post)){
			throw new Exception("DB Error : Insert Boards");
	}
		
		$conn->commit();
		header("Location: list.php");
		exit;
	} catch(Exception $e){
		$conn->rollback();
		echo $e->getMessage();//Exception 메세지 출력
		exit;
	}finally 
	{
		db_destroy_conn($conn);//DB 파기
	}
	


	
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/mini_board/src/css/common.css">
	<title>작성 페이지</title>
</head>
<body>
<?php 
	require_once(FILE_HEADER);
	?>
	<main class="container">
	
		<form action="/mini_board/src/insert.php" method="post">
		<table class="table-striped">
			<tr>
			<th>
			<label for="title">제목</label></th>
			<td><input type="text" name="title" id="title"></td></tr>
			<br><br>
			<tr>
			<th>
			<label for="content">내용</label></th>
			<td><textarea name="content" id="content" cols="30" rows="10"></textarea></td></tr>
			<br><br>
			</table>
			<section>	
				<button class= "in_btn" type="submit">작성</button>
				<a class="a_can" href="/mini_board/src/list.php">취소</a>
			</section>				
		</form>

	
	</main>
</body>
</html>
