<?php

// 반복문을 이용해서 1부터 10까지 숫자를 출력해주세요
//1
//2
//3
//...
//10

// for ($i =1; $i<=10; $i++) {
// 	echo $i,"\n";
// }

// 구구단 2단을 반복문을 이용해서 작성해 주세요.

// for ($gugu =1; $gugu<=9; $gugu++) {
// 	$num =$gugu * 2;
// 	echo "2X{$gugu}={$num}\n";
// }

// for($i = 1; $i<=2; $i++){
// 	echo "상위I\n";
// 	for($z = 0; $z<=2; $z++){
// 		echo "하위z";
// 	}
// }

// for($gugu=1; $gugu<=9; $gugu++) {
// 	for($num =1; $num<=9; $num++){
		
// 	$i= $gugu * $num;}
	
// 	echo "{$gugu}X {$num} ={$i}\n";
// }

// for($gugu=1; $gugu<=9; $gugu++) {
// 	for($num =1; $num<=9; $num++){
// 		$i= $gugu * $num;
	
		
// 	echo "{$gugu}X{$num}={$i}\n";}
// }

// for($gugu=1; $gugu<=9; $gugu++) {
// 	if($gugu %2===0)
// 		continue;
// 	echo"{$gugu}단\n";
// 	for($num =1; $num<=9; $num++){
// 		$i= $gugu * $num;
		

	
		
		
// 	echo "{$gugu}X{$num}={$i}\n";
// }
// }

// for($gugu=1; $gugu<=9; $gugu++) {
// 	if($gugu>=2 && $gugu<=8)
// 		continue;
// 	echo"{$gugu}단\n";
// 	for($num =1; $num<=9; $num++){
// 		$i= $gugu * $num;
		
		
// 	echo "{$gugu}X{$num}={$i}\n";}
// }

// for($gugu=1; $gugu<=9; $gugu++) {
// 	echo"{$gugu}단\n";
	
// 	for($num =1; $num<=9; $num++){
		
// 	$i= $gugu * $num;

	

	
// 	echo "{$gugu} X {$num} ={$i}\n";}
// }
// // for($gugu=1; $gugu<=9; $gugu++)
// // if( $gugu===1 || $gugu===9 ) {
// // 	echo "{$gugu}단\n";
	
// // 	for($num =1; $num<=9; $num++){
// // 		$i= $gugu * $num;
		
		
// // 	echo "{$gugu}X{$num}={$i}\n";}
// }

// for($gugu=1; $gugu<=9; $gugu++) {
// 	if($gugu!==1 && $gugu!==9)
// 		continue;
// 	echo"{$gugu}단\n";
// 	for($num =1; $num<=9; $num++){
// 		$i= $gugu * $num;
		
		
// 	echo "{$gugu}X{$num}={$i}\n";}
// }
// $arr = [
// 	"1"=>"*"
// 	,"2"=>"**"
// 	,"3"=>"***"
// 	,"4"=>"****"
// 	,"5"=>"*****"
// ];
// foreach($arr as $val ) {
// 	echo "$val\n";
// }

// for($star=1; $star<=5; $star++){
// 	for($in_star=1; $in_star<=$star; $in_star++ )
// 	echo"*";
// 	echo"\n";
// }

// $int_line =1;
// $int_star=1;
// while($int_line <=5) {
// 	$int_star=1;
// 	while($int_star<=$int_line){
// 		$int_star++;
// 		echo"*";
		
	
// 	}

// 	echo"\n";
// 	$int_line++;

// }


// function un_star(...$phy){
// 	foreach($arr as $val ) {
// 		echo "$val\n";
// 	}
	
// }
// echo un_star{"*"};
$star=5;

while($star>=1){
	$gara=1;
	while($gara<=5){
		if($gara<=$star){

	echo "*";	
}	else 
{	echo"";
	}
	$gara++;
	
	
}echo "\n";$star--;
}
// 변수를 하나 더 줘서 해보기
