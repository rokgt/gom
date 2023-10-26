// 유저가 특정행동을 했을때 동작한다
// ----------------
// 인라인 이벤트
// ----------------

//html파일 9~10라인확인

// ----------------
// 프로퍼티 리스너
// ----------------
const BTNGOOGLE= document.getElementById('btn_google');
BTNGOOGLE.onclick = function(){
	location.href='http://www.google.com';
}

// addEventListener(eventType, function) 방식
const BTNDAUM= document.getElementById('btn_daum');
let winOpen;
BTNDAUM.addEventListener('click',popOpen);
// ----------------
// 팝업창 닫기
// ----------------

const BTNCLOSE= document.getElementById('btn_close');
BTNCLOSE.addEventListener('click',()=>winOpen.close());

// -----------
// 이벤트 삭제
// -----------
BTNDAUM.removeEventListener('click',popOpen);

// function popOpen(window){
// 	window = open('http://www.daum.net', '', 'width=500 height=500')
// }
function popOpen(){
	winOpen = open('http://www.daum.net', '', 'width=500 height=500')
}

function test(){
	console.log("test");
}

function cb(fnc){
	fnc();
}
// 변수 = 3
// 	=>2
// function cb(값 받으시오){
// 	변수 = 받은값+1;

// 	return 받은값*4;
// }

// cb();

// function cb( 받은수){
// 	변수 = 받은수+1;

// 	return 받은수*4;
// }

// 또다른 함수...(cb); 다른 함수 명령어를 받아오는 친구 : 콜 백함수


BTNCLOSE.removeEventListener('click',closepop);

function closepop(){
	winOpen.close();
};

const DIV1 = document.querySelector('#div1');
DIV1.addEventListener('mouseenter',() =>{ 
	alert('DIV1에 들어왔어요.');
	DIV1.style.backgroundColor = 'red';
});


