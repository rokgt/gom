<?php

require_once("./04_ex_107_fnc_db_connect.php");

$conn =null;
my_db_conn($conn);

$sql = " SELECT "
		." * " 
		." FROM "
		." EMPLOYEES "
		." WHERE "
		." emp_no= :emp_no"
		;
// Prepared Statement셋팅 
$arr_ps = [
	":emp_no" => 10004
];
// Prepared Statement 생성
$stmt = $conn->prepare($sql);
$stmt->execute($arr_ps);// 쿼리실행
$result = $stmt->fetchAll();

print_r($result);

db_destroy_conn($conn);
