<?php
// 상속 : 부모 클래스의 property(메소드,멤버변수)를 자식 클래스가 상속받는것
class Parents{

	public function print_p(){
		echo "부모 클래스에서 출력\n";
	}
}

class Child extends parents {
	// 오버라이팅 : 부모 클래스에서 정의한 property를 자식 클래스에서 재정의 하는것
	public function print_p(){
		parent::print_p();//상속받은 부모 크랠스의 property를 사용하고 싶을 때
		echo "자식 클래스에서 출력";
	}

}
$obj_child = new Child();

$obj_child->print_p();