<?php
// 숫자 맞추기 게임

// 1. 1~100의 랜덤한 숫자를 맞추는 게임입니다.
// 2. 총 5번의 기회를 제공합니다.
// 3. 입력한 숫자가 정답보다 클 경우 " 더 큼" 출력
// 4. 입력한 숫자가 정답보다 작을 경우 "더 작음"출력
// 5.정답일 경우 "정답" 출력하고 게임종료
// 6.5번의 기회를 다 썼을 경우 정답과 "실패"를 출력

// $num= rand(1,100);
// while ($num===){
// 	while
// }
///

// 1. 반복문을 이용하여 숫자를 1~10까지 출력해주세요.
// for($i=1; $i<=10; $i++){
// 	echo $i."\n";
// }
// $i=1;
// while($i<=10){
// 	echo $i."\n";
// 	$i++;
// }
// $arr=[1,2,3,4,5,6,7,8,9,10];
// foreach($arr as $val){
// 	echo $val."\n";
// }
// 2. 구구단 8단을 출력해 주세요. 

// for($gu=1; $gu<=9; $gu++){
// 	$gu8=$gu*8;
// 	echo "8 X {$gu} = {$gu8}\n";
// }

// $gu=1;
// while ($gu<=9){
// 	$gu8=$gu*8;
// 	echo "8 X {$gu}= {$gu8}\n";
// 	$gu++;
// }

// foreach() {};

// 3. 19단을 출력해 주세요. 
// for($gugu=1; $gugu<=19; $gugu++){
// 	for($dan=1; $dan<=9; $dan++){
// 	$num=$gugu*$dan;
	
// 	echo "{$gugu} X {$dan} = {$num}\n";}
// }
// $gugu=1;


// while($gugu<=19){
// 	$dan=1;
// 	while($dan<=9){
// 		$num=$gugu*$dan;
// 		echo "{$gugu} X {$dan} = {$num}\n";
// 		$dan++;
// 	}$gugu++;
// }


// 4. 두 숫자를 더해주는 함수를 만들어 주세요. 

// function my_sum($num1,$num2){
// 	echo $num1+$num2;
// }
// my_sum(10,5);

// 5.짜장면이면 중식, 비빔밥이면 한식. 그 외는 양식으로 출력해주세요.

$str="피자";
if($str==="짜장"){
	echo "중식";}
	else if($str==="비빔밥"){
		echo "한식";
	}
	else{
		echo "양식";	
	}


