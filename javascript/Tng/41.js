//하
// 1.현재 시간을화면에 표시
//내가 한것
const DIVT = document.querySelector('#div_t')
getNow();
let interval;
 startTime();
function getNow(){
let now = new Date();
const NOWUSA = new Date();

let hour_24= now.getHours()
let min=now.getMinutes();
let sec= now.getSeconds();

// DIVT.innerHTML='현재시간'+(hour+':'+ min+':'+sec);

let AMPM = hour_24 > 12 ? '오후':'오전';
hour_12 = hour_24 > 12 ? hour_24 -12 : hour_24;
let print= AMPM + ' '
			+add_str_zero(hour_12)+':'
			+add_str_zero(min)+':'
			+add_str_zero(sec);

NOWUSA.setTime( now - (1000*60*60*13)); //현재시간 -13시
let now_usa = NOWUSA.toLocaleTimeString();			

DIVT.innerHTML= print + '<br>' + now_usa;
}	
			
function add_str_zero(num){
	return String(num < 10? '0' + num : num);
}

// 선생님이 하신것
// const NOW =new Date();

// DIVT.innerHTML = NOW.toLocaleTimeString()



// 중
// 2.실시간으로 시간을 화면에 표시

//내가 한것
// setInterval(() => {
// 	const date = new Date(); // 새로운 Date 객체 생성
// 	DIVT.innerHTML ='현재시간'+ date.toLocaleTimeString();
// }, 1000);

// 중하
// 멈춰버튼을 누르면, 시간이 정지할것

const BTNSTOP = document.querySelector('#btn');
BTNSTOP.addEventListener('click',stopTime);
function stopTime() {
clearInterval(interval);
}

// 중상
// 4.재시작 버튼을 누르면, 버튼을 누른 시점의 시간부터 다시 실시간으로 화면에 표시

const BTNRST = document.querySelector('#rst');
BTNRST.addEventListener('click',startTime)
function startTime(){
	interval = setInterval(getNow,1000);
}
