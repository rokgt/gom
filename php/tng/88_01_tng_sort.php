<?php

// 버블 정렬

$arr = [234,1,5,8,2,6,15,66];

// asort($arr);
// $count=8;

// // for($tmp >= $arr; $arr<=7; $arr++){
// for($z=$count-2; $z>=0; $z--){
// 	for($i=0;$i<=$z; $i++){
	
// 		if($arr[$i] > $arr[$i+1] ){
// 		$tmp = $arr[$i];
// $arr[$i]=$arr[$i+1];
// $arr[$i+1]=$tmp;}

// }
	
// }	

$i=0;

while($i<=7){
	$z=count($arr)-1;
	
	while($z<=0){
		if($arr[$i]>$arr[$i+1]){
			$tmp = $arr[$i];
			$arr[$i]=$arr[$i+1];
			$arr[$i+1]=$tmp;}$z--;
		}$i++;
		
	
}

		
	




// }
// echo $arr;
print_r($arr);


