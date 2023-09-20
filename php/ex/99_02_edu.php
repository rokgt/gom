<?php
// 함수 선언 : 함수를 만들어 두는 것
// function my_sum($num1, $num2){
// 	$sum = $num1 + $num2;
// 	return $sum;
// }




// 함수 호출 : 미리 만들어둔 함수를 부르는 것
// $result = my_sum(2,5);

// function my_sub($num1,$num2,$num3){
// 	$sub=$num1-$num2-$num3;
// 	echo $sub;
// }
// $result = my_sub(100,50,25);

// function my_sub($num1,$num2,$num3){
// 	return $num1-$num2-$num3;
	
// }
// echo my_sub(100,50,25);


// 가변파라미터

function my_all_sum(...$numbers) {
	// print_r($numbers);
	$sum=0;
	foreach($numbers as $key =>$val){
		$sum =$sum + $val;
	}
	return $sum;
	// return array_sum($numbers);
}
// echo my_all_sum(2,4,5);

// 레퍼런스 파라미터(pass by referance)

function my_ref($val,&$ref){
	$val="my_ref";
	$ref="my_ref";
}
$str1= "str1";
$str2 ="str2";
my_ref($str1,$str2);

echo "str1 : {$str1}\n";
echo "str2 : {$str2}\n";

