<?php

// try-catch문 : 예외처리를 하기 위한 문법
//try {
	// 우리가 실행하고 싶은 소스코드를 작성
//}
//catch ( exception $e ) {
	// 예외가 발생 했을 때 실행되는 소스코드를 작성
//}
//finally {
	// 정상처리 또는 예외처리에 관계없이 무조건 실행되는 소스코드
//}
require_once("./04_ex_107_fnc_db_connect.php");

$conn =null;



try{
	echo "트라이";
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
}catch(exception $e){
	echo " 예외 발생 : {$e->getmessage()}";
}finally{



// print_r($result);

db_destroy_conn($conn);
echo "파이널리";
}