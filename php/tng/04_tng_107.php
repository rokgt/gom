<?php

// PDO클래스를 이용해서 아래 쿼리를 실행해 주세요.
// 1. 자신의 사원정보를 employees테이블에 등록해 주세요.
// 2. 자신의 이름을 "둘리",성을 "호이"로 변경해주세요.
// 3. 자신의 정보를 출력해주세요.
// 4.자신의 정보를 삭제해주세요.
// 5.PDO클래스 사용법 숙지

require_once("../php/04_ex_107_fnc_db_connect.php");

$conn=null;
my_db_conn($conn);

$sql = " INSERT INTO employees ( "
	   ." emp_no, birth_date, first_name "
	   ." last_name, gender, hire_date, sup_no "
	   ." values :emp_no "
	   ." :birth_date "
	   ." :first_name "
	   ." :last_name "
	   ." :gender "
	   ." :hire_date "
	   ." :sup_no )";

$arr_me=[
	":emp_no = 500001",
	":birth_date = 19820130",
	":first_name = yoo",
	" :last_name =hyunho",
	" :gender = M ",
	" :hire_date = 20230817",
	" :sup_no=1"];

$stmt = $conn->prepare($sql);
$stmt->execute($arr_ps);// 쿼리실행
$result = $stmt->fetchAll();
	
	print_r($result);	


	   