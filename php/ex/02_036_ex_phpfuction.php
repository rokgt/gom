<?php

// trim() : 문자열의 공백을 없애주는 함수
// echo "  asdf  ", "\n", trim("  asdf  ");

//strtoupper

// echo strtoupper("awasdf"), strtolower("QWEDFASDV");
//strlen:문자열의 길이를 반환
//mb_strlen();멀티바이트 문자열의 길이를 반환
// echo mb_strlen("가나다");
// echo mb_strlen("asd");

// str _replace() : 특정 문자를 치환해주는 함수
// echo str_replace("a", "/", "erasdfasdf");

// substr() : 문자열을 자르는 함수
// echo substr("wefsdfsadf", 1, 4);
// // mb_substr() : 멀티바이트 문자열을 자르는 함수
// echo mb_substr("가나다라마바사아자차카타파하", 1, 4);
// strpos() : 문자열에서 특정 문자의 위치를 변환하는 함수
// echo strpos ("asdfgh","d");
// isset() : 변수의 존재를 확인하는 함수
// $str =" ";
// var_dump(isset($str));

// // empty : 변수의 값이 비어있는지 확인하는 함수
// var_dump(empty($str));

// $num =1;
// settype($num,"string");// $num 성질까지 바꿔준다

// echo gettype ($num);

// time() : 1970/01/01을 기준으로 타임스탬프(초단위) 시간 확인하는 함수
// echo time();

// date() : 원하는 형식으로 시간 표시해주는 함수
echo date("Y-m-d-H:i:s", time());
