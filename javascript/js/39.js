// DOM(Document Object Model)이란? 교제 p679 그림참조
// 웹문서를 제어하기 위해서 웹문서를 객체화한것
// DOM API를 통해서 HTML의 구조나 내용 또는 스타일등을 동적으로 조작가능

// 요소 선택
//  고유한 ID로 요소를 선택
const TITLE = document.getElementById('title');

//태그명으로 요소를 선택(해당 요소들을 컬렉션 객체로 가져온다.)
const H2 = document.getElementsByTagName('h2');
H2[0].style.color = 'red';

// 클래스로 요소를 선택

const NONE = document.getElementsByClassName('none-li');

// css선택자를 사용해 요소를 찾는 메소드
// querySelector(): 복수일경우 가장 첫번째 요소만 선택
const S_ID = document.querySelector('#subtitle2');
const S_NONE = document.querySelector('.none-li');
//querySelector(): 복수의 요소라면 전부 선택
const S_NONE_ALL = document.querySelectorAll('.none-li');

//--------------------
//요소조직
// -------------------
// textContent: 순수한텍스트 데이터를 전달, 이전의 태그들은 모두 제거
TITLE.textContent = '<P>탕수육</P>';
// innerHTML :태그는 태그로 인식해서 전달, 이전의 태그들은 모두제거
TITLE.innerHTML = '<P>탕수육</P>';


//setAttribute('','') 요소에 속성을 추가
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
