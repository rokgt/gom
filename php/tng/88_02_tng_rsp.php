<?php

 $input=fgets(STDIN);
// $gawi= scissors;
// $bawi = rock;
// $bo=paper;
// echo "입력값 : {$in_star}";
// $choices = ['rock', 'paper', 'scissors'];
// $userChoice =$choices[array_rand($choices)];
// $computerChoice = $choices[array_rand($choices)];
// $result = '';
// if ($userChoice == $computerChoice) {
//     $result = '비겼습니다!';
// } elseif (($userChoice == 'rock' && $computerChoice == 'scissors') || 
//           ($userChoice == 'scissors' && $computerChoice == 'paper') || 
//           ($userChoice == 'paper' && $computerChoice == 'rock')) {
//     $result = '당신이 이겼습니다!';
// } else {
//     $result = '컴퓨터가 이겼습니다!';
// }


// echo '사용자: ' . $userChoice . '<br>';
// echo '컴퓨터: ' . $computerChoice . '<br>';
// echo '결과: ' . $result;


$result = "";
$user= 0;
$computer = mt_rand(0,2);

if($input==="s"){
	$user= 0;
}
elseif($input==="r"){
	$user = 1;
}
elseif( $input==="p"){$user=2;	
}
if($computer===0){
	$com = "s";
}
elseif($computer===1){
	$com = "r";
}
elseif($computer===2)	{$com="p";
}

if ($user===$computer){
	$result = "비겼다";
}
elseif
	(($user===0 && $computer===2)||
	($user===1 && $computer===0)||
	($user===2 && $computer===1)){
	$result ="내가 이김";
}
else {$result="내가 졌소";}

echo "나 :".$input;
echo "콤퓨타 :".$com,"\n";
echo "결과 :".$result;


