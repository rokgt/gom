<?php
// foreach : 배열의 길이만큼 루프하는 문법

$arr = [1, 2, 3, 4];
// echo count($arr);

// for($i = 0; $i <= count($arr) - 1; $i++){
// 	echo $arr[$i];
// }

// $arr2 =[
// 	"현희" => "불고기"
// 	,"호철" => "김치"
// 	,"휘야" => "못정함"
// ];

foreach ($arr as $key => $val) {
	echo "{$key} : {$val}\n";
}

// // 키가 필요 없을때

foreach ($arr as  $val) {
	echo "{$val}\n";
}
