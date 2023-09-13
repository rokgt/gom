<?php
// 몇개일지 모르는 숫자를 다 더해주는 함수를 만들어주세요.
// function my_sum(...$num){
//     $sum=0;	
// 	foreach($num as $val){		

// 	$sum+=$val;}
// 	return $sum;
// 	}
	

// echo	my_sum(1, 2, 5, 3, 4);



// 숫자로 이루어진 문자열을 하나 받습니다,
// 이 문자열의 모든 숫자를 더해주세요.
// 예)"3421"일경우, 3+4+2+1해서 10이 리턴되는 함수

$str="2781";
$sub_str1=substr($str,0,1);
$sub_str2=substr($str,1,1);
$sub_str3=substr($str,2,1);
$sub_str4=substr($str,3,1);
echo $sub_str1+$sub_str2+$sub_str3+$sub_str4;





