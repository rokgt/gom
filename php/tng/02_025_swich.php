<?php 

//1등이면 금상, 2등이면 은상, 3등이면 동상, 4등이면 장려상, 그 외는 노력상을 출력해주세요.

// $rank = 2;

// switch ( $rank ) {
// 	case 1:
// 		echo "금상";
// 		break;
// 	case 2:
// 		echo "은상";
// 		break;
// 	case 3:
// 		echo "동상";
// 		break;
// 	case 4:
// 		echo "장려상";
// 		break;
// 	default:
// 		echo "노력상";
// 		break;							
// }

// $rank = 5;
// $award="";

// switch ( $rank ) {
// 	case 1:
// 		$award="금상";
// 		break;
// 	case 2:
// 		$award="은상";
// 		break;
// 	case 3:
// 		$award="동상";
// 		break;
// 	case 4:
// 		$award="장려상";
// 		break;
// 	default:
// 		$award="노력상";
// 		break;							
// }
// echo $award;


$rank = 3;
$award="";

if ($rank ===1){
	$award="금상";
}
else if ($rank ===2){
	$award="은상";
}
else if ($rank ===3){
	$award="동상";
}
else if ($rank ===4){
	$award="장려상";
}


else {
	$award="노력상";
}

echo $award;