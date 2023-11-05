<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_test/src/");
define("FILE_HEADER",ROOT."header.php");
require_once(ROOT."lib/lib_bd.php");
$conn= null;
$id= isset($_GET["id"]) ? $_GET["id"] : $_POST["id"];

$page= isset($_GET["page"]) ? $_GET["page"] :$_POST["page"];

$http_method=$_SERVER["REQUEST_METHOD"];

try{

    if(!my_db_conn($conn)){

        throw new Exception("DB Error : PDO Instance");
    }

    if($http_method === "GET"){

        $arr_param = [
            "id"=> $id
        ];
        $result = db_select_boards_id($conn, $arr_param);

        if($result === false) {
            throw new Exception("DB Error: PDO Select_id");
        }else if(!(count($result)===1)){
            throw new Exception("DB Error: PDO Select_id_Count," .count($result));
        }
        $item = $result[0];
    }else{
        $arr_param = [
			"id" => $id
			,"title" => $_POST["title"]
			,"content" => $_POST["content"]
		];
        $conn->beginTransaction();

        if(!db_update_boards_id($conn, $arr_param)){
			throw new Exception("DB Error: Update_boards_id");

		}
		$conn-> commit();

        header("Location: detail_test.php/?id={$id}&page={$page}");
		
        exit;

		
    }

 }catch(Exception $e){

    if($http_method === "POST"){
    
    $conn->rollback();
    }
    echo $e->getMassaege();
    exit;

} finally{
    db_destroy_conn($conn);
}

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mini_test/src/test_common.css">
    <title>수정페이지</title>
</head>
<body>

<?php 
		require_once(FILE_HEADER)
	?>
	<form action="/mini_test/src/update_test.php" method="post">
        <table>
            <input type="hidden" name="id" value="<?php echo $id?>">
			<input type="hidden" name="page" value="<?php echo $page?>">
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
                <input type="text" name="title" value="<?php echo $item["title"]?>">
                </td>
            </tr>
            <tr>	
                <th>
                    내용
                </th>
                <td>
                
                <textarea name="content" id="content" cols="30" rows="10"><?php echo $item["content"]?></textarea>	
                </td>
            </tr>
        
            </table>
            <section>
                <button type="submit">수정완료</button>
                <a href="/mini_test/src/detail_test.php/?id=<?php echo $id;?>&page=<?php echo $page;?>">수정취소</a>
            </section>
        </form>
	</main>
	
	
	
    
</body>
</html>