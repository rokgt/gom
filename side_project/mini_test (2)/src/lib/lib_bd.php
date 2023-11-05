<?php

function my_db_conn(&$conn){
	$db_host    = "localhost"; 
	$db_user    = "root"; 
	$db_pw      = "php504";
	$db_name    = "mini_test";
	$db_charset = "utf8mb4";
	$db_dns     = "mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_charset;
	try {
		$db_options = [
			
			PDO::ATTR_EMULATE_PREPARES     =>false
			
			,PDO::ATTR_ERRMODE             =>PDO::ERRMODE_EXCEPTION
			
			,PDO::ATTR_DEFAULT_FETCH_MODE   =>PDO::FETCH_ASSOC
		];
		
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
		."		id "
		."		,title"
		."		,create_at "
		." FROM "
		."		boards "
		." ORDER BY "
		."		id DESC "
		." LIMIT :list_cnt OFFSET :offset "
		;
	
 		$arr_ps = [
			":list_cnt"=> $arr_param["list_cnt"]
			,":offset"=> $arr_param["offset"]
		];
		$stmt = $conn ->prepare($sql);
		$stmt->execute($arr_ps);
		$result=$stmt->fetchAll();
		return $result;
	}catch(Exception $e){
		return false;
	}
}

function db_select_boards_cnt(&$conn) {
	$sql=
			" SELECT "
			."     count(id) as cnt "
			." FROM "
			."		 boards "
			." WHERE "
			."		delete_flg = '0' "
			;
			try{
				$stmt = $conn->query($sql);
				$result = $stmt->fetchAll();
				return (int)$result[0]["cnt"];
			}catch(Exception $e){
				return false;
			}
}


function db_select_boards_id(&$conn,&$arr_param){
	$sql=" SELECT "
		."  	id "
		."		,title "
		."		,content "
		."		,create_at "
		." FROM "
		." 		boards "
		." WHERE "
		." 		id = :id "
		;
		$arr_ps = [
			":id"=>$arr_param["id"]
		];
		try{
			
		$stmt = $conn->prepare($sql);
		$stmt->execute($arr_ps);
		$result=$stmt->fetchAll();
		return $result;
	}catch(Exception $e){
		echo $e->getMessage();
		return false;
	}

}
function db_update_boards_id(&$conn, &$arr_param){
	$sql=
	"		UPDATE "
	."				boards "
	."		SET "
	."			title = :title "
	."			,content = :content "
	."		WHERE "
	."			id = :id ";

	$arr_ps=[
		":title"=>$arr_param["title"]
		,":content"=>$arr_param["content"]
		,":id"=>$arr_param["id"]
		
	];
	try{
		$stmt=$conn->prepare($sql);
		$result=$stmt->execute($arr_ps);
		return $result;

	}catch(Exception $e){
		echo $e->getMessage();
		return false;

	}

}

function db_insert_boards(&$conn,&$arr_param){

	$sql =
		" INSERT INTO boards ( "
		."		title "
		."		,content "
		." ) "
		." VALUES ( "
		."		:title "
		."		,:content "
		." ) "
		;
	$arr_ps = [
		":title" => $arr_param["title"]
		,":content" => $arr_param["content"]
	];
	
	try{
		$stmt = $conn->prepare($sql);
		$result = $stmt-> execute($arr_ps);
		
			return $result;
		
	}catch(Exception $e) {

		return false;

	}


}
function db_delete_boards_id(&$conn, &$arr_param){
	$sql= " UPDATE boards "
		  ." SET "
		  ." 		delete_at= now() "
		  ." 		,delete_flg = '1' "
		  ." WHERE "
		  ."		id=:id "
		  ;
	$arr_ps = [
		":id"=> $arr_param["id"]
	];  
	try {
		
		$stmt=$conn->prepare($sql);
		$result = $stmt->execute($arr_ps);
		return $result;

	}catch(Exception $e) {
		echo $e->getMessage();
		return false;
		}
	}



?>
