<?php

//class : 동종의 객체들이 모여있는 집합을 정의한 것

class ClassRoom {
	// 멤버필드: 멤버 변수와 메소드가 정의되어 있는 장소

	// 접근제어 지시자 : public, private, protected
	//멤버 변수:class내에 있는 변수
	public $computer; //어디에서나 접근 가능
	private $book;// class내에서만 접근 가능
	protected $bag; // class 와 나를 상속 받은 자식class내에서만 접근 가능
	public	$now;
	
	//생성자(constructor) :
// 					-클래스를 이용하여 객체를 생성할 때 사용
// 					-생성자를 정의하지 않을때는 디폴트 생성자가 선언 됨

	public function __construct(){
		echo "컨스트럭트 실행";
		$this->now=date("Y-m-d H-i-s");
	
	}
	// 메소드(method) : class내에 있는 함수 
	public function class_room__set_value(){
		$this->computer = "컴퓨터";
		$this->book = "책";
		$this->bag ="가방";

	}
	public function ClassRoomPrint(){
		$str = $this->computer."\n"
		.$this->book."\n"
		.$this->bag;
		echo $str;

	}

	// getter 메소드
	public function get_now(){
		return $this->now;
}
// getter 메소드
public function set_now(){
	return $this->now="9999-01-01";
	}

	// static
public static function static_test() {
	echo "스태틱 메소드";
}
}

// class instance 생성
$obj_classroom = new ClassRoom();
// $obj_ClassRoom->class_room__set_value();
// var_dump($obj_ClassRoom->computer);
// $obj_ClassRoom->ClassRoomPrint();
$obj_classroom->set_now();
echo $obj_classroom->get_now();

// static 객체 사용방법

// ClassRoom:: static_test();




