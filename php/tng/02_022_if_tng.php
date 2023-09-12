<?php
// IF로 만들어주세요.
// 성적
//  범위 :
// 			이상~미만
// 			100 	:A+
// 			90~99	:A
// 			80~89	:B
// 			70~79	:C
// 			60~69	:D
// 			60미만  :F


$num= 78.8;

// $answer = "당신의 점수는 %u점입니다.<%s>";

$grade ="";


if($num >= 100){
	 $grade ="A+";
}
else if($num>=90 ){
	 $grade ="A";
}
else if($num>80 ){
	 $grade ="B";
}
else if($num>=70 ){
	 $grade ="C";
}
else if($num>=60 ){
	 $grade ="D";
}
else if($num<60 ){
	 $grade ="F";

}
// if ($num>=0 && $num<=100){
// 	$str =sprintf ($answer,$num,$grade);
// echo $str;
// }
// else {
// 		echo "잘못된 값을 입력하셨습니다.";}



	 


echo "당신의 점수는 {$num}점입니다.<{$grade}>";
