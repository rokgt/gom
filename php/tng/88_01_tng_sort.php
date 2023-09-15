<?php

// 버블 정렬

$arr = [234,1,5,8,2,6,15,66];

// asort($arr);
// $count=8;
// for($tmp > $arr; $arr<=7; $arr++){
// for($z=$count-2; $z>=0; $z--){
// 	for($i=0;$i<=$z; $i++){
	
// 		if($arr[$i] > $arr[$i+1] ){
// 		$tmp = $arr[$i];
// $arr[$i]=$arr[$i+1];
// $arr[$i+1]=$tmp;}
// // echo "{$z}: {$i}\n";
// }
	
// }	
// }
// $i=0;
// $z=count($arr);
// while($i<8){
// 	$z=count($arr)-1;
	
// 	while($z>0){
		
		
// 		if($arr[$z]<$arr[$z-1]){
// 			$tmp = $arr[$z];
// 			$arr[$z]=$arr[$z-1];
// 			$arr[$z-1]=$tmp;}$z--;$i++;
			
// 		}
		
	
// }
$i=0;
$z=count($arr)-1;
while($i<$z){
	$x=0;
	
	while($x<$z-$i){
		
		
		if($arr[$x]>$arr[$x+1]){
			$tmp = $arr[$x];
			$arr[$x]=$arr[$x+1];
			$arr[$x+1]=$tmp;}$x++;
			
		}
		$i++;
	
}

		
	





print_r($arr);


