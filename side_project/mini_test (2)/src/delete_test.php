<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_test/src/");
define("FILE_HEADER",ROOT."header.php");
require_once(ROOT."lib/lib_bd.php");



    
try{   
    $conn= null;          
    if(!my_db_conn($conn)){
     
       throw new Exception("DB Error : PDO Instance");
    }

    $http_method=$_SERVER["REQUEST_METHOD"];
    
     
    if($http_method === "GET"){
        $id = isset($_GET["id"]) ? $_GET["id"] : " ";
        $page = isset($_GET["page"]) ? $_GET["page"] : "";
        if($id === ""){
           throw new Exception("DB Error : PDO Instance");
        }
        
        $arr_param = [
            "id"=>$id
        ];
        $result = db_select_boards_id($conn, $arr_param);

        if($result === false){
            throw new Exception("DB Error : Select_id");
        }else if(!(count($result) === 1)){
            throw new Exception("DB Error : Select_id count");
        }
        $item=$result[0];
        $conn->beginTransaction();

    }
    
     
}catch(Exception $e){    
    echo $e->getMessage();
    exit;
     
}finally{
         db_destroy_conn($sonn);
} 
        
    
     
     
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mini_test/src/test_common.css">
    <title>Document</title>
</head>
<body>
<?php 
	require_once(FILE_HEADER);
	?>
	<main class="container">
		<table class="table-striped">
			<caption>
				삭제하면 끝인데
				<br>
				정말로 삭제 하시겠나?
				<br><br>
			</caption>
			<tr>
				<th>
					게시글 번호
				</th>
				<td>
					<?php echo $item["id"]?>
				</td>
			</tr>
			<tr>
				<th>
					작성일
				</th>
				<td>
					<?php echo $item["create_at"]?>
				</td>
			</tr>
			<tr>
				<th>
					제목
				</th>
				<td>
					<?php echo $item["title"]?>
				</td>
			</tr>
			<tr>
				<th>
					내용
				</th>
				<td>
					<?php echo $item["content"]?>
				</td>
			</tr>
		</table>
	</main>
	<section>
		<form action="/mini_test/src/delete_test.php" method="POST">
			<input type="hidden" name="id"value="<?php echo $id;?>">
		<button  type="submit">진짜삭제</button>
		<a href="/mini_test/src/detail_test.php/?id=<?php echo $id;?>&page=<?php echo $page;?>">취소</a>		
		</form>
	</section>
</body>
</html>