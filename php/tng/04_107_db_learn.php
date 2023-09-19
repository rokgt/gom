<?php

// 1. db_conn 이라는 함수를 만들어주세요.
// 		1-1. 기능:db설정및 pdo객체 생성
function tng_db_conn(&$db_conn){
	$db_host  = "localhost";
	$db_user  = "root";
	$db_pw    = "php504";
	$db_name  = "employees";
	$db_charset= "utf8mb4";
	$db_dns   = "mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_charset;

	$db_option = [
		PDO::ATTR_EMULATE_PREPARES    =>false
		,PDO::ATTR_ERRMODE		      =>PDO::ERRMODE_EXCEPTION
		,PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC
	];
$db_conn = new PDO($db_dns, $db_user, $db_pw, $db_option);	
}




// 2. 현재 급여가 80,000이상인 사원을 조회하기

// $db_conn=null;
// tng_db_conn($db_conn);

// $sql= " SELECT "
// 	  ." emp_no,salary " 
// 	  ." FROM "
// 	  ." salaries "

	  
// 	  ." WHERE to_date>=now() "
// 	  ." AND "
// 	  ." salary>=:salary ";

// $arr_tng =[
// 	":salary"=>80000
// ];

// 3. 조회한 데이터를 루프하면서 급여가 100,000이상이면 
//    사원 번호 출력해주세요



// $stmt = $db_conn->prepare($sql);
// $stmt->execute($arr_tng);
// $result = $stmt->fetchAll();
// var_dump($result);
// print_r($result);

// $cnt=0;
// foreach ($result as $sal){
// 		if($sal["salary"]>=100000)
// 		// echo $sal["emp_no"],"\n";
// 		$cnt++;
// }
// echo $cnt;


// 1. titles 테이블에 데이터가 없는 사원을 검색
// 2.[1]번에 해당하는 사원의 직책정보를 insert
// 	2-1.직책은 "green",시작일은 현재시간, 종료일은 99990101
// 3.디비에 저장 될 것

$db_conn=null;
tng_db_conn($db_conn);

$sql= " SELECT " 
	  ." emp.* "
	  ." FROM employees emp "
	  ." LEFT OUTER JOIN "
	  ." titles tit "
	  ." ON "
	  ." emp.emp_no=tit.emp_no "
	  ." WHERE tit.title IS NULL "
	  ;
	
	  $db_conn=null;
	  tng_db_conn($db_conn);   
$sql_in=" INSERT INTO " 
		." titles "
		." VALUES ( "
		." :emp_no "
		." :title "
		." now() "
		." :to_date "
		." ) ";

$arr=[
	":emp_no"=>700000
	,":title"=>'green'
	,":to_date"=>99990101
];


$stmt1 = $db_conn->prepare($sql);
$stmt1->execute();
$result1 = $stmt1->fetchAll();
// print_r($result1);

$stmt2 = $db_conn->prepare($sql_in);
$stmt2->execute($arr);
$result = $stmt2->fetchAll();
foreach($result1 as $emp_no){
	if($emp_no["emp_no"]===$arr["emp_no"]);
}

print_r($result2);

