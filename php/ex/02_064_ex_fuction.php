<?php

// 두 숫자를 받아서 더해주는 함수를 만들어봅시다.

// function my_sum($a, $b){
// 	echo $a + $b;
// }

// // my_sum(5, 4);
// // 리턴이 있는 함수

// function my_sum2($a, $b){
// 	return $a + $b;
// }

// echo my_sum2(1, 2);

// 두수를 받아서 - * /%를 리턴하는 함수를 만들어 주세요.

// function multiply($m, $n){
// 	return $m * $n;
// }

// echo multiply(5,3);

// function div($m, $n){
// 	return $m / $n;
// }
// echo div(5,3);

// function sub($m, $n){
// 	return $m - $n;
// }
// echo sub(5,3);

// function remain($m, $n){
// 	return $m - $n;
// }
// echo remain(5,3);

// 파라미터의 기본값이 설정되어 있는 함수

// function my_sum3( $a, $b = 5){
// 	return $a+$b;
// }
// 	echo  my_sum3(1);

// 가변 파라미터
// function my_args_param(...$items){
// 	echo $items[0];
// }
// my_args_param("a", "b", "c");

// 5.5이하 버전

// function my_args_param(){
// 	$items=func_get_args();
// 	echo $items[0];
// }
// my_args_param("a", "b", "c");

// 재귀 함수 

// function my_ap($i){
// 	$sum=0;
// 	for($i; $i >0; $i--){
// 		$sum+=$i;
// 	}
// 	return $sum;
// } 
// echo my_ap(10);

// function my_ad($num){
// 	$sum=0;
// 	while($num > 0){
// 		$sum+=$num;
		
// 		$num--;
// 	}
// 	return $sum;
// }
// echo my_ad(50);



// function my_recursion($i) {
// 	if($i===1) {
// 		return 1;
// 	}
// 	return $i+ my_recursion($i-1);
// }
// echo my_recursion(3);

function test1($str) {
	$str= " 함수 test1";
	return $str;
}

function test2 (&$str) {
	$str= "함수 test2";
	return $str;
}

$str = "???";
$result =test1($str);
echo $str,"\n" ;

echo $result;