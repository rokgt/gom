<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_test/src/");
define("FILE_HEADER",ROOT."header.php");
require_once(ROOT."lib/lib_bd.php");

$http_method=$_SERVER["REQUEST_METHOD"];
if($http_method === "POST"){
   try{
        $arr_post = $_POST;
        $conn= null;
        
        if(!my_db_conn($conn)){

        throw new Exception("DB Error : PDO Instance");
        }
        $conn->beginTransaction();

        if(!db_insert_boards($conn,$arr_post)){

            throw new Exception("DB Error : Insert Boards");

        }

        $conn->commit();
        header("Location: list_test.php");
        exit;

   }catch(Exception $e){
        $conn->rollback();
        echo $e->getMessage();
        exit;

   }finally{
    db_destroy_conn($sonn);
   } 
   



}

?>



<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mini_test/src/test_common.css">
    <title>작성페이지</title>
</head>
<body>
<?php 
	require_once(FILE_HEADER);
	?>
    
		
		<form action="/mini_test/src/insert_test.php" method="post">
			<table >
				<tr>
					<th>
						<label for="title">제목</label>
					</th>
					<td>
						<input type="text" name="title" id="title">
					</td>
				</tr>
				<br><br>
				<tr>
					<th>
						<label for="content">내용</label>
					</th>
					<td>
						<textarea name="content" id="content" cols="30" rows="10" ></textarea>
					</td>
				</tr>
				<br><br>
			</table>
			<section>	
				<button type="submit">작성</button>
				<a class="button" href="/mini_test/src/list_test.php">취소</a>
			</section>				
		</form>

	
	
    
</body>
</html>