<?php

//class : 동종의 객체들이 모여있는 집합을 정의한 것

class ClassRoom {
	// 멤버필드: 멤버 변수와 메소드가 정의되어 있는 장소

	// 접근제어 지시자 : public, private, protected
	//멤버 변수:class내에 있는 변수
	public $computer; //어디에서나 접근 가능
	private $book;// class내에서만 접근 가능
	protected $bag; // class 와 나를 상속 받은 자식class내에서만 접근 가능

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
}
// class instance 생성
$obj_ClassRoom = new ClassRoom();
$obj_ClassRoom->class_room__set_value();
// var_dump($obj_ClassRoom->computer);
$obj_ClassRoom->ClassRoomPrint();