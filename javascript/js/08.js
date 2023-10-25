// 조건문
// if(조건){

// }else if(조건){

// }else{

// }

let age = 30;
switch(age) {
	case 20:
		console.log("20대");
		break;
	case 30:
		console.log("30대");
		break;
	default:
	console.log(모르겠다);
		break;	
}
// ------------------------------------------------------------
// 반복문(while, do_while, for, foreach, for...in, for...of)
// ------------------------------------------------------------

// foreach : 배열만 사용가능
let arr =[1, 2, 3, 4];
arr.forEach( function( val, key ){//형태고정
	console.log(`${key} : ${val}`);// 처리할 내용만 적어주면 된다
});

// for...in: 모든 객체를 루프 가능, key에만 접근이 가능

let obj = {
	key1: 'val1'
	,key2: 'val2'
}
for (let key in obj) {
	console.log(key);
}
//for...of: 모든 interable객체를 루프 가능, value에만 접근이 가능(string, array, map, set, typearray...)
for (let val of arr) {
	console.log(val);
}	

// 정렬해주세요.
let sort_arr = [3, 5, 2, 7, 10];
// sort_arr.sort((a, b) => a - b);
// console.log(sort_arr);


	for(let a = 0; a < sort_arr.length-1; a++){
		for(let b=0; b<sort_arr.lenth-a-1; b++ ){
			if(sort_arr[b]>sort_arr[b+1]){
				let c = sort_arr[b];
				sort_arr[b]=sort_arr[b+1];
				sort_arr[b+1] = c
			}
		}
	}
	console.log(sort_arr)
;

