// -----------------
// 기본 데이터 타입
// -----------------

// 숫자(number)

let num = 1;

// 문자열(string)

let str = "string";

// 불리언(boolean)

let boo = true;

// null

let nu = null;

// undefined:값이 할당 안된 상태

let und;

// simbol: 고유한 ID를 가진 데이터 타입

let symbol_1 = Symbol("symbol");
let symbol_2 = Symbol("symbol");


// 객체 타입 (기본타입을 제외한 전부)
// Object
let obj = {
	food1:"탕수육"
	,food2:"짜장면"
	,food3:"라조기"
	,eat: function(){
		console.log("먹자");
	}
	,list:{
		list1:"리스트1"
		,list2:"리스트2"
	}
}
// Array

let arr = [1, 2, 3];

// Date
// Math
// 그 외에 기본 데이터 타입을 제외한 모든 것


//  자기 자신의 회원 정보를 객체로 만들어 보세요.

let dta = {
	f_name:"유"
	,l_name:"현호"
	,age:42
	,b_data:19820130
	
}