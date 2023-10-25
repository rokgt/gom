// console.log("반갑습니다. JS파일입니다.");


// -----------------
// 변수(var, let, const)
// -----------------
// var: 중복선언 가능, 재할당 가능, 함수레벨 스코프
// var u_name = "홀길동";
// console.log(u_name);
// var u_name = "갑순이";
// console.log(u_name);

// let : 중복 선언 불가능, 재할당 가능, 블록레벨 스코프
let u_name = "홀길동";
console.log(u_name);
u_name = "갑순이";
console.log(u_name);

//const: 중복선언 불가능,재할당 불가능, 블록레벨 스코프
const AGE = 19;
// AGE = 20;
 console.log(AGE);

// -----------------
// 스코프
// -----------------

// 전역 스코프

let gender ="M"


// 함수레벨 스코프

function test1(){
	let t = "test1";
	console.log(t);
	console.log(gender);
}

// 블록레벨 스코프{중괄호 안에 }

// function test2(){
// 	var t = "test1";
// 	if(true){
// 		var t ="test2"
// 	}
// 	console.log(t);
// }
// function test3(){
// 	let t = "test1";
// 	if(true){
// 		let t ="test2"
// 	}
// 	console.log(t);
// }
// -----------------
// 호이스팅 (hoisting)
// -----------------
// 인터프리티가 변수와 함수의 메모리 공간을 선언 전에 미리 할당하는것

// console.log(htest1());
// console.log(hvar);
// console.log(hlet);

// function htest1(){
// 	return "htest1 함수 입니다.";
// }

// var hvar ="var로 선언";
// let hlet ="let으로 선언";
