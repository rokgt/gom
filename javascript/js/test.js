

// 두 수를 받아서 더한 값을 리턴해주는 함수를 만들어 봅시다.
// function mySum(a,b){
// 	return a+b;
// }
// let mySum2=(a,b)=>a+b;

// 익명함수는 변수로 만들어 저장하거나 콜백함수 파라미터에 바로 저장한다


// 콜백함수: 함수의 실행을 나중에 하는것

// function myCallBack(fnc){
// 	fnc();
// }
// myCallBack(function(){
// 	console.log('123')
// })
// function test(){
// 	console.log('A');
	
// 	mySum2(2,5);
// }
// test();

// setTimeout( function(){
// 	console.log('123');
// });
// console.log('A');
// mySum(2,5);

// [1,2,3].filter(function(num){
// 	return num===3;
// })
// function myPrint(){
// 	console.log('123');
// }
// setTimeout(myPrint,1000);

// 함수를 3개 만들어주세요.
//  -1 php를 출력하는 함수
// function php(){
// 	console.log('php');
// }
// setTimeout(php,3000)
//  -2 504를 출력하는 함수
// function php504(){
// 	console.log('504');
// }
// setTimeout(php504,5000)
//  -3 풀스택을 출력하는 함수
// function full(){
// 	console.log('풀스택');
// }

// full();

// function myFull(logs,ms){
// 	setTimeout(()=>console.log(logs),ms);
// }
// myFull('풀스택',0);
// myFull('php',3000);
// myFull('504',5000);

// 현재 시간 구해주세요.
// const NOW = new Date;
// let nT= NOW.toLocaleTimeString();


const NOW = new Date();
let year = NOW.getFullYear();
let month = NOW.getMonth()+1;
let day = NOW.getDate();
let hours = NOW.getHours();
let minutes = NOW.getMinutes();
let seconds = NOW.getSeconds();
const TODAY=year+'-'+ month+'-'+ day+' '+ hours+':'+minutes+':'+seconds;

console.log(year+'-'+ month+'-'+ day+' '+ hours+':'+minutes+':'+seconds);

// 버튼을 하나 만듭시다.
// 버튼을 클릭하면 네이버로 이동시켜 주세요.
const NAVER = document.getElementById('naver');
// NAVER.onclick=function(){
// 	location.href='http://www.naver.com';
// }
NAVER.addEventListener('click',()=>location.href='http://www.naver.com');