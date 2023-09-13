<?php

// 폴더(디렉토리) 만들기
// mkdir("../tng/testdir", 777);

// 폴더 삭제
// rmdir("../tng/testdir");

// 파일
$file = fopen("zz.txt","a");
// $test="";
// if($file) {
// 	echo "참";
// }else{
// 	echo "거짓";
// }


$f_write = fwrite($file, "짜장면\n");
fclose($file);