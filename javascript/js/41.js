// 타이머 함수

// 1. setTimeout(콜백함수, 시간(ms)):일정시간이 흐른 후에 콜백함수를 실행

// setTimeout(() =>console.log('시간'),3000);

// 콘솔에 1초 뒤에 'A' 2초뒤에 'B',3초뒤에 'C'가 출력되도록 프로그램을 만들어주세요.
// setTimeout(() =>
// 	console.log('A'),1000
// );
// setTimeout(() =>
// 	console.log('B'),2000
// );
// setTimeout(() =>
// 	console.log('C'),3000
// );
// setTimeout(() =>{
// 	console.log('A');
// 	setTimeout(() =>{
// 		console.log('B');
// 		setTimeout(() =>{
// 			console.log('C');
// 		},1000);
// 	},1000);

// },1000);
function my_print(chr,ms){
	setTimeout(() => console.log(chr),ms );
}
// my_print('A',1000);
// my_print('B',2000);
// my_print('C',3000);

// clearTimeout(해당 setTimeout객체) :타이머를 삭제
let mySet = setTimeout(() =>console.log('시간'),5000);
clearTimeout(mySet);

// setInterval(콜백함수 , 시간(ms)) : 일정 시간마다 반복

let myInter = setInterval(()=> console.log('민경씨 자지마'), 1000)

// clearInterval(해당 setInterval) :인터벌 삭제
clearInterval(myInter);

// 화면을 로드하고 5초뒤에 '두둥등장' 이라는 매우 큰 글씨가 나타나게 해주세요

//내가 한 방식

const DIV_5S = document.querySelector('#div_5s');

setTimeout(() => DIV_5S.innerHTML='두둥등장',5000);

// 선생님이 하신방식
setTimeout(()=>{
	const H1 = document.createElement('h1');
	H1.innerHTML ='두둥등장!';
	document.body.appendChild(H1);
},5000);

setTimeout(myAddH1 , 5000);

function myAddH1(){
	const H1 = document.createElement('h1');
	H1.innerHTML ='두둥등장!';
	document.body.appendChild(H1);
};



