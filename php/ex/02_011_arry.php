<?php
// 인덱스 배열
// $arr2 = [0, 1, 2];


//멀티 타입 배열
// $arr =array(0, "a", 2, 7, 9); 



// var_dump($arr[1]);

// echo $arr[1];

// $arr3 = ["배열", $arr[1], $arr2[2]];

// var_dump($arr3);

// 연상 배열
// $arr4 = [
// 	"name" => "홍길동"
// 	,"age"=> 18
// 	,"gender"=> "남자"
// ];

// echo $arr4["name"];

// 다차원 배열

// $arr5 = [
// 	[11, 12, 13]
// 	,[
// 		[211, 212, 213],
// 		[221, 222, 223]
// 	]
// 	,[31, 32, 33]
// ];
// var_dump($arr5[1][1][1]);

// $arr6 = [
// 	"msg" => "OK"		
// 	,"info"=>["name" => "홍길동"
// 	,"age"=> 20
// 	]	
// ];

// var_dump($arr6["msg"]);
// var_dump($arr6["info"]["age"]);
// echo $arr6["info"]["age"];

// unset() :배열의 원소 삭제;
// $arr_week = [ "Sun", "Mon","delete", "Tue", "Wed"];
// unset($arr_week[2]);
// print_r($arr_week);

// 배열의 정렬 :asort(),arsort(),ksort(),krsort()
// asort() : 배열의 값을 오름차순 정렬

// $arr_asort = ["b", "a", "d", "c"];
// asort($arr_asort);
// print_r($arr_asort);

// arsort() : 배열의 값을 내림차순 정렬

// arsort($arr_asort);
// print_r($arr_asort);

// ksort() : 배열의 키을 오름차순 정렬

// $arr_ksort = [
// 	"b" =>"1"
// 	, "a" =>"2"
// 	, "d" =>"3"
// 	, "c" =>"4"
// ];

// ksort($arr_ksort);
// print_r($arr_ksort);

// krsort() : 배열의 키을 내림차순 정렬

// $arr_krsort = [
// 	"b" =>"1"
// 	, "a" =>"2"
// 	, "d" =>"3"
// 	, "c" =>"4"
// ];
// krsort($arr_ksort);
// print_r($arr_ksort);

// count() :배열 혹은 그 외 것들의 사이즈를 반환하는 함수
// echo count($arr_ksort);

// array diff() : A배열과 B배열을 비교해서 중복되지 않는 A배열의 원소를 반환
// $arr_diff1 = [1, 2, 3];
// $arr_diff2 = [1, 4, 5];
// $arr_diff = array_diff($arr_diff1, $arr_diff2);
// print_r($arr_diff);

// array_push() : 기존 배열에 값을 추가 하는 함수
// $arr_push = [1, 2, 3];
// // array_push($arr_push, 4, 5);
// $arr_push[] = 4;
// $arr_push[] = 5;
// print_r($arr_push);

// $arr_push2 = [
// 	"a"=> 1
// 	,"b"=> 2
// ];
// $arr_push2["c"] = 3; 
// print_r($arr_push2);

// 

$arr=[
	[
		"emp_no" => 10001
		,"gender" => "F"
	]
	,[
		"emp_no" => 10002
		,"gender" => "M"
	]
];

// 남자인 경우에만 사원번호를 출력해주세요.
foreach($arr as $key => $item){
	if ($item["gender"] === "M" )
	echo $item["emp_no"];

}