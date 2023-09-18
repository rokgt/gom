<?php

function my_db_conn(&$conn){

$db_host    = "localhost"; //host
$db_user    = "root"; //user
$db_pw      = "php504";//password
$db_name = "employees";//DB name
$db_charset = "utf8mb4";//chsrset
$db_dns     = "mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_charset;

$db_options = [
	//DB의 Prepared statement 기능을 사용하도록 설정
	PDO::ATTR_EMULATE_PREPARES     =>false
	//PDO Exception을 Throws하도록 설정
	,PDO::ATTR_ERRMODE             =>PDO::ERRMODE_EXCEPTION
	//연상배열로 Fetch 하도록 설정
	,PDO::ATTR_DEFAULT_FETCH_MODE   =>PDO::FETCH_ASSOC

];
// PDO Class로 DB연동

$conn = new PDO($db_dns, $db_user, $db_pw, $db_options);
}
function db_destroy_conn(&$conn) {
	$conn=null;
}
