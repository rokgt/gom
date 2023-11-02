<?php

require_once("config.php");//설정파일 불러오기
//require_once("config.php);
require_once("autoload.php");// 오토로드 파일 불러오기
// echo _EXTENSION_PHP;
//require_once("autoload.php");

// 라우터 호출

new router\Router();
//new router\Router();