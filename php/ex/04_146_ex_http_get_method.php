<?php
// GET Method
// https://www.google.com/search?q=%EB%9A%B1%EC%9D%B4%EC%82%AC%EC%A7%84&sca_esv
// 프로토콜/   도메인    /
//http://www.naver.com/mini_board/src/list.php/?page=2&num=10
//프로토콜/ 도메인    / 패스 path/쿼리스트링 or파라미터
// 프로토콜 : 통신을 하기위한 규약, 약속, 규칙(http부분)
// 도메인 : 우리가 접속하고자 하는 서버의 ip또는 별칭(www.naver.com부분)
// 패스 : 실행시키고자 하는 처리의 주소(mini_board/src/list.php부분)
// 쿼리스트링(파라미터) :Get Method로 통신할때 유저가 보내주는 데이터 (?page=2&num=10부분)

print_r($_GET);

?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<a href="/04_146_ex_http_get_method.php/?page=2&num=10">테스트</a>
</body>
</html>