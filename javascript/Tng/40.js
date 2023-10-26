// 1. 버튼을 클릭시 아래 내용의 알러트가 나옵니다.
// "안녕하세요."
// "숨어있는 div를 찾아보세요"

const BTN =document.querySelector('#btn_hidden');
BTN.addEventListener('click',() => alert('"안녕하세요"\n"숨어있는 div를 찾아보세요"'));

// 2-1. 특정영역에 마우스 포인터가 진입하면 아래 내용의 알러트가 나옵니다.
// "두근두근"
const DIVOUT =document.querySelector('#div_out');
DIVOUT.addEventListener('mouseenter',()=>alert('두근두근'))


//2-2 들킨 상태에서는 알러트가 안나옵니다.


// 3. 2번의 영역을 클릭하면 아래의 알러트를 출력하고, 배경색이 베이지 색으로 바뀌어 나타납니다.
// "들켰다!"
const DIVIN = document.querySelector('#div_in');
DIVIN.addEventListener('click',()=> {
	alert('들켰다!');
	DIVIN.style.backgroundColor='beige'
});

// 4. 3번의 상태에서 한번 더 클릭하면 아래의 알러트를 출력하고, 배경색이 흰색으로 바뀌어 안보이게 됩니다.
// "다시 숨는다"
// DIVIN.addEventListener('click',()=> {
// 	alert('다시숨는다');
// 	DIVIN.style.backgroundColor='white'})


// 1 -> 2-1 -> 3 -> 4 -> 2-2