<?php

// () : 조건
// [] : 배열 만들때
// {} : 내가 처리하고  싶은 연산들
// ;  : 최소의 연산단위

// if문 이용 : 90 이면 "수",80 이면 "우", 그외는 "노력"

// $num =90;
// if($num===90){
// 	echo "수";
// }else if ($num===80){
// 	echo "우";
// }
// else{
// 	echo "노력";
// }
// while문 이용 : 구구단 7단
// $gugu=1;
// while($gugu<=9){
	
// 	$gugu7=$gugu*7;
// 	echo "7 X {$gugu} = {$gugu7}\n";
// 	$gugu++;
// }
// $gugu=1;
// while(true){
// 	$gugu7=$gugu*7;
// 	echo "7 X {$gugu} = {$gugu7}\n";
// 	$gugu++;
// 	if($gugu===10){
// 		break;
// 	}
// }

$arr = [1,2,3];
$arr2 = [
	"key1"=>"val1"
	,"key2"=>[
		"key3"=> "val3"
		,"key4"=> "val4"
	]
];

echo $arr[2],"\n";
echo $arr2["key2"]["key4"];