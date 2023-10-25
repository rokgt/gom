<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_test/src/");
require_once(ROOT."lib/lib_bd.php");

$conn = null;
$list_cnt=5;
$page_num=1;
if(!my_db_conn($conn)){
	echo "DB Error : PDO Instance";
	exit;
}

$boards_cnt=db_select_boards_cnt($conn);
if($boards_cnt===false){
	throw new Exception("DB Error : SELECT Count");
	exit;
}
$max_page_num = ceil($boards_cnt/$list_cnt);
if(isset($_GET["page"])){
	$page_num=$_GET["page"];
}

$result = db_select_boards_paging($conn);
if(!$result){
	// var_dump($result);
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
		<div class=side1>
			<div>
				<a href="">
					게시판
				</a>
			</div>
			<div>
				<a href="">
					갤러리
				</a>
				
			</div>
			<div>
				<a href="">
					물어볼거
				</a>
			</div>
			<div>
				<a href="">
					후원
				</a>
				
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
		<div>
			광고 기다리는중....
		</div>
	</main>
	<button type="submit">나눔신청</button>
	<section>
		<a href=""><</a>
		<a href="">1</a>
		<a href="">2</a>
		<a href="">3</a>
		<a href="">4</a>
		<a href="">5</a>
		<a href="">></a>
	</section>
</body>
</html>