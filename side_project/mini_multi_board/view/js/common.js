// const BTN_DETAIL = document.querySelector('#btnDetail');
// const BTN_MODAL_CLOSE = document.querySelector('#btnModalClose')

// BTN_DETAIL.addEventListener('click',()=>{
// 	const MODAL = document.querySelector('#modal');
// 	MODAL.classList.remove('displayNone');
	
// });
// BTN_MODAL_CLOSE.addEventListener('click',()=>{
// 	const MODAL = document.querySelector('#modal');
// 	MODAL.classList.add('displayNone');
	
// });

let test;

//상세 모달 제어

function openDetail(id){
	const URL ='/board/detail?id='+id;
	console.log(URL);
	fetch(URL)
	.then( response=> response.json())
	.then( data=> {
		console.log(data);
		const TITLE = document.querySelector('#b_title');
		const CONTENT = document.querySelector('#b_content');
		const IMG = document.querySelector('#b_img');
		const CREATED_AT = document.querySelector('#created_at')
		const UPDATED_AT = document.querySelector('#updated_at')
		const DEL_INPUT = document.querySelector('#del_id');
		const BTN_DEL = document.querySelector('#btn_del');

		TITLE.innerHTML = data.data.b_title;
		CONTENT.innerHTML = data.data.b_content;
		CREATED_AT.innerHTML = data.data.created_at;
		UPDATED_AT.innerHTML = data.data.updated_at;
		DEL_INPUT.value = data.data.id;
		IMG.setAttribute('src',data.data.b_img);

		// 삭제 버튼 표시 처리
		if(data.data.uflg === "1"){
			BTN_DEL.classList.remove('d-none');
		}else {
			BTN_DEL.classList.add('d-none');
		}
		
		// 모달 오픈
		openModal();
	})
	.catch(error=> console.log(error))
}
function openModal(){
	const MODAL=document.querySelector('#modalDetail');
	MODAL.classList.add('show');
	MODAL.style = 'display: block; background-color: rgba(0, 0, 0, 0.7);';
}

// 모달 닫기 함수
function closeDetailModal(){
	const MODAL=document.querySelector('#modalDetail');
	MODAL.classList.remove('show');
	MODAL.style = 'display: none;';
}
//아이디 확인


// 내가 한것
// function idChk(){

	// const INPUT_ID = document.querySelector('#u_id');
	// const URL='/user/idchk?u_id='+INPUT_ID.value;
	
// 	fetch(URL)
// 	.then(response=>response.json())
// 	.then(chk=>{
// 		let rok = chk.data.cnt === 0 ? '됨' : '안됨';
// 		window.alert(rok);
		
		 
// 	})


// }
// 선생님이 하신것 POST로 fetch하는 방법
// id 중복 체크 처리
function idChk(){
	const ID_CHK_MSG = document.getElementById('idChkMsg');
	ID_CHK_MSG.innerHTML="";//이전에 있을지 모르는 데이터 삭제용
	const INPUT_ID= document.getElementById('u_id');
	//const INPUT_ID= document.getElementById('u_id').value; 이렇게 가져와도 된다
	const URL = '/user/idchk';
	// 새로운 폼데이타
	const formData= new FormData();

	formData.append("u_id", INPUT_ID.value);//유저가 입력한 아이디 폼에 셋팅

	const HEADER = {
		method: "POST"
		,body:formData		
	};

	fetch(URL, HEADER)
	.then( response=> response.json())
	.then(data=>{
		if(data.errflg === "0"){
			ID_CHK_MSG.innerHTML = "사용 가능한 아이디입니다."
			ID_CHK_MSG.classList ='text-success';
		}else {
			ID_CHK_MSG.innerHTML = "사용 할수 없는 아이디입니다."
			ID_CHK_MSG.classList ='text-danger';
		}
	})
	.catch( error => console.log(error));
}
// 삭제처리
function deleteCard(){
	const B_PK =document.querySelector('#del_id').value;
	const URL = '/board/remove?id=' + B_PK;	
	fetch(URL)	
	.then(response=>response.json())
 	.then(data => {
			if(data.errflg === "0"){
				// 모달닫기
				closeDetailModal();
				// 카드삭제
				const MAIN = document.querySelector('main');
				const CARD_NAME ='#card'+ data.id;
				const DEL_CARD =document.querySelector(CARD_NAME);
				MAIN.removeChild(DEL_CARD);

			}else{
				alert(data.msg);
			}
	 })
	.catch( error => console.log(error) )


	
}