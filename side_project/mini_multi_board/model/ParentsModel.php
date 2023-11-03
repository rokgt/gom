<?php

namespace model;

use PDO;

use Exception;

class ParentsModel {
	protected $conn;

	public function __construct(){
		$db_dns     = "mysql:host="._DB_HOST.";dbname="._DB_NAME.";charset="._DB_CHARSET;
			
		try {
			$db_options = [
				//DB의 Prepared statement 기능을 사용하도록 설정
				PDO::ATTR_EMULATE_PREPARES     =>false
				//PDO Exception을 Throws하도록 설정
				,PDO::ATTR_ERRMODE             =>PDO::ERRMODE_EXCEPTION
				//연상배열로 Fetch 하도록 설정
				,PDO::ATTR_DEFAULT_FETCH_MODE   =>PDO::FETCH_ASSOC
			];
			// PDO Class로 DB연동
			$this->conn = new PDO($db_dns, _DB_USER, _DB_PW, $db_options);
			
		}catch (Exception $e){
			echo "DB Connect Error:" .$e->getMessage();
				$conn=null;
				exit();
			}
		}
		//DB 파기
		public function destroy(){
			$this->conn = null;
		}
		//beginTransaction
		public function beginTransaction(){
			$this->conn->beginTransaction();
		}
		// commit
		public function commit(){
			$this->conn->commit();
		}
		// rollBack
		public function rollBack(){
			$this->conn->rollBack();
		}
	}