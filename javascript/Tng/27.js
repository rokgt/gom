//원본을 보존하면서 오름차순 정렬 해주세요.
const ARR_SORT = [6, 3, 5, 8, 92, 3, 7, 5, 100, 80, 40]; 

let arr_sort = ARR_SORT.toSorted(( a , b) => a - b);

// 짝수와 홀수를 분리해서 각각 새로운 배열 만들어 주세요.( 다하면 함수로도 만들어 보세요.)
const ARR2 = [5, 7, 3, 4, 5, 1, 2];

let arr_boo = ARR2.filter( num => num %2 ===0);
let arr_boo2= ARR2.filter( num => num %2 !==0);
 
function test(arr, flg){
	if(flg === 0){
		return arr.filter(num => num %2 ===0);
	}else{
		return arr.filter(num => num %2 !==0);
	}
}


// 다음 문자열에서 구분문자를 '.'에서' '(공백)으로 변경해 주세요.
const STR1 = 'php504.meer.kat';
STR1.replace(/\./g,' ');

