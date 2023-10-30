<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_test/src/");
require_once(ROOT."lib/lib_bd.php");

$conn = null;

$id=$_GET["id"];
var_dump($id);

$arr_param=[
	"id"=>$id
];
$result=db_select_boards_id($conn,$arr_param);
$item=$result[0];
db_destroy_conn($conn);

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

<main>
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
</main>
	
</body>
</html>