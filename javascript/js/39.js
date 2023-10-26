// DOM(Document Object Model)이란? 교제 p679 그림참조
// 웹문서를 제어하기 위해서 웹문서를 객체화한것
// DOM API를 통해서 HTML의 구조나 내용 또는 스타일등을 동적으로 조작가능

// 요소 선택
//  고유한 ID로 요소를 선택
const TITLE = document.getElementById('title');

//태그명으로 요소를 선택(해당 요소들을 컬렉션 객체로 가져온다.)반복문읈 사용하기 힘들다
const H2 = document.getElementsByTagName('h2');
H2[0].style.color = 'red';

// 클래스로 요소를 선택 반복문읈 사용하기 힘들다

const NONE = document.getElementsByClassName('none-li');

// css선택자를 사용해 요소를 찾는 메소드
// querySelector(): 복수일경우 가장 첫번째 요소만 선택
const S_ID = document.querySelector('#subtitle2');
const S_NONE = document.querySelector('.none-li');
//querySelector(): 복수의 요소라면 전부 선택 반복문을 사용하기 용이히다
const S_NONE_ALL = document.querySelectorAll('.none-li');

//--------------------
//요소조직
// -------------------
// textContent: 순수한텍스트 데이터를 전달, 이전의 태그들은 모두 제거
TITLE.textContent = '<P>탕수육</P>';
// innerHTML :태그는 태그로 인식해서 전달, 이전의 태그들은 모두제거
TITLE.innerHTML = '<P>탕수육</P>';


//setAttribute('속성명','속성값') 요소에 속성을 추가
// **몇몇 속성들은 DOM객체에서 바로 설정 가능
// ex) INTXT.placeholder='바로 접근 가능';
const TEXT =document.querySelector('#intxt');
TEXT.setAttribute('placeholder', '뭐머뭐멍머머멈');

//removeAttribute('') : 요소의 속성을 제거
TEXT.removeAttribute('placeholder');

// ------------------
// 요소 스타일링
// ------------------
// style : 인라인으로 스타일 추가
TITLE.style.color = 'red';
//classList: 클래스로 스타일 추가 또는 삭제
TITLE.classList.add('class1','class2','class3');
TITLE.classList.remove('class1');

// ------------------
// 새로운 요소 생성
// ------------------
// 요소 만들기
// const LI = document.createElement('li')
// LI.innerHTML = '글자 들어간다'

//삽입할 부모 요소 접근
// const UL=document.querySelector('#ul')

//부모 요소의 가장 마지막 위치에 삽입
// UL.appendChild(LI);

// 요소를 특정 위치에 삽입하는 방법
// const SPACE = document.querySelector('ul li:nth-child(3)');

// UL.insertBefore(LI, SPACE);

// 해당 요소를 지우는 방법
// LI.remove();

// 1.사과게임 위에 장기를 넣어주세요.

const NONE_LI4 = document.createElement('li');
NONE_LI4.innerHTML = '장기'

const UL=document.getElementById('ul');

UL.appendChild(NONE_LI4);

const APPLE =document.querySelector('li:nth-child(4)');

UL.insertBefore(NONE_LI4, APPLE);



// 2.어메이징 브릭에 베이지 배경색을 ㄴ허어주세요.

const NONE_LAST = document.querySelector('ul li:nth-child(9)');

NONE_LAST.style.backgroundColor = 'beige';




// 3.리스트에서 짝수는 빨간색 글씨,홀수는 파랑색 글씨로 만들어 주세요.
// const UL_LI = document.querySelectorAll('li');
// for(let num = 0; num<UL_LI.length; num++){
// 	// if(num % 2 === 0){
// 	// 	UL_LI[num].style.color = 'blue'
// 	// } else{
// 	// 	UL_LI[num].style.color = 'red'
// 	// }	
// 	UL_LI[num].style.color = num % 2 === 0? 'blue' : 'red';	
// }

//방법2

//1.사과게임 위에 장기를 넣어주세요.
const LIJANGGI = document.createElement('li');
LIJANGGI.innerHTML = '장기';
const LIAPPLE =document.getElementById('apple');
UL.insertBefore(LIJANGGI,LIAPPLE);

//2.어메이징 브릭에 베이지 배경색을 넣어주세요.
const LIAM = document.querySelector('ul li:last-child');
LIAM.style.backgroundColor ='red';

//3.리스트에서 짝수는 빨간색 글씨,홀수는 파랑색 글씨로 만들어 주세요.

const TEST1=document.querySelectorAll ('ul li:nth-child(even)');
const TEST2=document.querySelectorAll ('ul li:nth-child(odd)');
for(let num = 0; num <TEST1.length; num++){
	TEST1[num].style.color = 'red';
}
for(let num = 0; num <TEST2.length; num++){
	TEST2[num].style.color = 'blue';
}