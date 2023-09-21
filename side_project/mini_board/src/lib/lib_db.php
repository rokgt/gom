<?php

function my_db_conn(&$conn){
	$db_host    = "localhost"; //host
	$db_user    = "root"; //user
	$db_pw      = "php504";//password
	$db_name    = "mini_board";//DB name
	$db_charset = "utf8mb4";//chsrset
	$db_dns     = "mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_charset;
	try {
		$db_options = [
			//DB의 Prepared statement 기능을 사용하도록 설정
			PDO::ATTR_EMULATE_PREPARES     =>false
			//PDO Exception을 Throws하도록 설정
			,PDO::ATTR_ERRMODE             =>PDO::ERRMODE_EXCEPTION
			//연상배열로 Fetch 하도록 설정
			,PDO::ATTR_DEFAULT_FETCH_MODE   =>PDO::FETCH_ASSOC
		];
		// PDO Class로 DB연동
		$conn = new PDO($db_dns, $db_user, $db_pw, $db_options);
		return true;
	}catch (Exception $e){
		$conn=null;
		return false;
	}
}



function db_destroy_conn(&$conn) {
	$conn=null;
}


function db_select_boards_paging(&$conn,&$arr_param){
	try {
		$sql=
			" SELECT "
			." 		id "
			."		,title "
			."		,create_at "
			." FROM "
			."		boards "
			." ORDER BY "
			."		id DESC "
			." LIMIT :list_cnt OFFSET :offset "
			;
			
		$arr_ps=[
			":list_cnt"=> $arr_param["list_cnt"]
			,":offset"=> $arr_param["offset"]
		];
		$stmt = $conn->prepare($sql);
		$stmt->execute($arr_ps);
		$result = $stmt->fetchAll();
		return $result;
	} catch(Exception $e){
		echo $e->getMessage();
		return false;
	}	
}

function db_select_boards_cnt(&$conn) {
	$sql=
			" SELECT "
			."     count(id) as cnt "
			." FROM "
			."		 boards "
			;
			try{
				$stmt = $conn->query($sql);
				$result = $stmt->fetchAll();
				return (int)$result[0]["cnt"];// 정상: 쿼리 결과
			}catch(Exception $e){
				return false;// 예외발생 :false 리턴
			}

}
function db_insert_boards(&$conn,&$arr_param){
	$sql =
		" INSERT INTO boards ( "
		."			title "
		."			,content "
		." ) "
		." VALUES ( "
		."		:title "
		."		,:content "
		." ) "
		;
	$arr_ps =[
		":title"=> $arr_param["title"]
		,":content" => $arr_param["content"]
	];	
	try {
		$stmt = $conn->prepare($sql);
		$result = $stmt->execute($arr_ps);
		return $result;
	} catch(Exception $e){
		
		return false;

	}	
}

?>