<?php
// include: 해당 파일을 불러옵니다. 오류 발생 시 프로그램을 정지하지 않습니다.
// include("./03_070_ex_include2.php");
// // require:해당 파일을 불러옵니다. 오류 발생 시 프로그램을 정지합니다.
// require("./03_070_ex_include2.php");
// include_once,require once 중복된것 가려낼때
include_once("./03_070_ex_include2.php");
include_once("./03_070_ex_include2.php");

echo "include 11111\n";