// promise 객체
//	- 비동기 프로그래밍의 근간이 되는 기법중 하나
//  - 프로미스를 사용하면 콜백 함수를 대체하고,비동기 작업의 흐름을 쉽게 제어가능
//	-promise 객체는 비동기 작업의 최종 완료 또는 실패를 나타내는 독자적인 객체
//

// promise 사용법

// const PROMISE1 = new Promise( function(resolve, reject){
// 	let flg = true;
// 	if(flg) {
// 		return resolve('성공');// 요청 성공 시 resolve()를 호출
// 	}else {
// 		return reject('실패');//요청 실패시 reject()를 호출
// 	}
// });

// PROMISE1
// .then(data=>console.log(data))
// .catch(err=>console.log(err))
// .finally(()=>console.log('finally입니다.'))

// PROMISE1
// .then(()=>setTimeout(()=>{console.log('A')},3000))
// .then(()=>setTimeout(()=>{console.log('B')},2000))
// .then(()=>setTimeout(()=>{console.log('C')},1000))

function PRO2(ms){
	return new Promise( function(resolve,reject){
		let flg = true;
		if(flg){
			return resolve('성공');// 요청 성공 시 resolve()를 호출
		}else {
			return reject('실패');//요청 실패시 reject()를 호출
		}
	});
}
