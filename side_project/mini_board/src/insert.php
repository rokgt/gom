<?php
define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
define("FILE_HEADER",ROOT."header.php");//헤더 패스
define("ERROR_MSG_PARAM"," %s : 필수 입력 사항입니다.");
require_once(ROOT."lib/lib_db.php");//DB관련 라이브러리

// POST로 request가 왔을 때 처리
$conn = null;
$http_method=$_SERVER["REQUEST_METHOD"];
$arr_err_msg = [];
$title="";
$content="";
if($http_method === "POST"){
	try{
		$title =isset($_POST["title"]) ? trim($_POST["title"]) : "";
		$content=isset($_POST["content"]) ? trim($_POST["content"]) : "";
		if($title === ""){
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "제목");
		}
		if($content === ""){
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "내용");
		}
		
	
		
		if(count($arr_err_msg) === 0){
		$arr_post = $_POST;
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
		exit;}
	} catch(Exception $e){
		$conn->rollback();
		// echo $e->getMessage();//Exception 메세지 출력
		header("Location: error.php/?err_msg={$e->getMessage()}");
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
		<?php
			foreach($arr_err_msg as $val) {
			?>
				<p><?php echo $val?></p>
		<?php		
			}
		?>
		<form action="/mini_board/src/insert.php" method="post">
			<table class="table-striped">
				<tr>
					<th>
						<label for="title">제목</label>
					</th>
					<td>
						<input type="text" name="title" id="title" value="<?php echo $title?>">
					</td>
				</tr>
				<br><br>
				<tr>
					<th>
						<label for="content">내용</label>
					</th>
					<td>
						<textarea name="content" id="content" cols="30" rows="10" ><?php echo $content?></textarea>
					</td>
				</tr>
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
