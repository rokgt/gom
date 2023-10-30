// console.log('A');
// console.log('B');
// console.log('C');

// console.log('A');
// setTimeout(()=>{
// 	console.log('B');
// },1000)
// console.log('B');
// console.log('C');
// function my_setTimeout(callback,ms){
// const NOW = new Date();
// let l1= new Date();

// while(l1 -NOW <= 2000){
// 	l1 = new Date();
// }
// callback();
// }

// my_setTimeout(()=>console.log('1'),1000);
// my_setTimeout(()=>console.log('2'),1000);
// my_setTimeout(()=>console.log('3'),1000);


setTimeout(()=>{
	console.log('A');
},3000);
setTimeout(()=>{
	console.log('B');
},2000);
setTimeout(()=>{
	console.log('C');
},1000);
// 비동기 처리를 동기처리로 하고 싶을때 (콜백지옥:콜백 함수를 이용하여 비동기 처리를 동기처리 하도록 만들때 나타나는 소스코드의 난잡한 현상

setTimeout(()=>{
	console.log('A');
	setTimeout(()=>{
		console.log('B');
		setTimeout(()=>{
			console.log('C');
		},1000);
	},2000);
},3000);

