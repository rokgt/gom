<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_test/src/");
define("FILE_HEADER",ROOT."header.php");
require_once(ROOT."lib/lib_bd.php");
$id="";
$conn = null;

try {
	
	if(!isset($_GET['id'])|| $_GET["id"]=== "" ) {
		throw new Exception("parameter Error : no id");
	}
	$id=$_GET["id"];
	$page = $_GET["page"];
	
	if(!my_db_conn($conn)){
		throw new Exception("DB Error : PDO Instance");
	}
	$arr_param=[
		"id"=>$id
		
	];
	$result=db_select_boards_id($conn,$arr_param);
	// var_dump($result);
	if(!$result){
		throw new Exception("DB Error : PDO Select_id");
	}else if(!(count($result) === 1)){
		throw new Exception("DB Error : PDO Select_id count,".count($result));
	}
	$item=$result[0];
}catch(Exception $e){
	echo $e->getMessage();
	exit;
}finally{
	db_destroy_conn($conn);

}









?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/mini_test/src/test_common.css">
	<title>상세페이지</title>
</head>
<body>
<?php 
		require_once(FILE_HEADER)
	?>

	<table>
		<tr>
			<th>
				번호
			</th>
			<td>
				<?php echo $item["id"] ?>
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
				<?php echo $item["content"] ?>
					
			</td>
		</tr>
		<tr>	
			<th>
				작성일
			</th>
			<td>
				 <?php echo $item["create_at"] ?> 
			</td>
		</tr>
	</table>
	<a href="#">수정</a>
	<a href="/mini_test/src/list_test.php/?page=<?php echo $page;?>">취소</a>
	<a href="#">삭제</a>
	
</body>
</html>