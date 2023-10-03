<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_test/src/");
require_once(ROOT."lib/lib_bd.php");

$conn= null;
if(!my_db_conn($conn)){
	echo "DB Error : PDO Instance";
	exit;
}

$result=db_select_boards_paging($conn);
if(!$result){
	echo "DB Error : SELECT boards";
	exit;
}




db_destroy_conn($conn);
// var_dump($result);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="test_common.css">
	<title>Document</title>
</head>
<body>
	<header>
		<h1>소소한 나눔</h1>
	</header>
	<main>
		<div>
			<div>
				게시판
			</div>
			<div>
				갤러리
			</div>
			<div>
				물어볼거
			</div>
			<div>
				후원
			</div>
		</div>
		<table>
			<colgroup>
				<col width="20%">
				<col width="50%">
				<col width="30%">
			</colgroup>
			<tr>
				<th>
					번호
				</th>
				<th>
					제목
				</th>
				<th>
					작성일
				</th>
			</tr>
			<?php 

				foreach($result as $item){
			?>
			<tr>
				<td>
					<?php echo $item["id"] ?>
				</td>
				<td>
				<?php echo $item["title"] ?>
				</td>
				<td>
				<?php echo $item["create_at"] ?>
				</td>
			</tr>
			<?php } ?>
						
		</table>
		
	</main>
	<button type="submit">나눔신청</button>
	<section>
		<a href="">이전</a>
		<a href="">1</a>
		<a href="">2</a>
		<a href="">3</a>
		<a href="">4</a>
		<a href="">5</a>
		<a href="">다음</a>
	</section>
</body>
</html>