const BTN_CALL=document.querySelector('#btnApi');
BTN_CALL.addEventListener('click',call)
function call(){
	const INPUT_TXT=document.querySelector('#inputUrl');
	fetch(INPUT_TXT.value.trim())
	.then(response=>{
		console.log(response)
		if(response.status >=200 && response.status<300){
			return response.json();
		}else{
			throw new Error('뭐 잘못됐나 확인해봐라');
		}
	})
	.then(data=> makeImg(data))
	.catch(error=>console.log(error));
}

function makeImg(data){
	data.forEach(item =>{
		//아티클 관련 요소 생성
		const ARTICLE = document.createElement('article');
		const ARTICLE_ID = document.createElement('div');
		const ARTICLE_IMG = document.createElement('img');

		// 아티클 관련 요소의 속성 및 컨텐츠 셋팅
		ARTICLE_ID.className ='articleId'
		ARTICLE_ID.innerHTML =item.id;
		ARTICLE_IMG.className ='articleImg';
		ARTICLE_IMG.setAttribute('src',item.download_url);

		// 아티클 관련 요소 구조 셋팅
		ARTICLE.appendChild(ARTICLE_ID);
		ARTICLE.appendChild(ARTICLE_IMG);

		const SECTION_CONTENTS =document.querySelector('.sectionContents');
		SECTION_CONTENTS.appendChild(ARTICLE);
	})
}
// function makeImg(data){
// 	data.forEach(item=>{
// 		const ARTICLE=document.createElement('div');
// 		const ARTICLE_ID=document.createElement('div');
// 		const ARTICLE_IMG=document.createElement('img');

// 		ARTICLE.classList='article';
// 		ARTICLE_ID.classList='article-id';
// 		ARTICLE_IMG.classList='article-img';

// 		ARTICLE_ID.innerHTML=item.id;
// 		ARTICLE_IMG.setAttribute('src',item.download_url);

// 		ARTICLE.appendChild(ARTICLE_ID);
// 		ARTICLE.appendChild(ARTICLE_IMG);
// 		const DIV_IMG=document.querySelector('.div-img');
// 		DIV_IMG.appendChild(ARTICLE);
// 	});
// }




const BTN_REMOVE= document.querySelector('#btnRemove');
BTN_REMOVE.addEventListener('click',imgClear);
function imgClear(){
	const SECTION_CONTENTS = document.querySelector('.sectionContents');
	
	SECTION_CONTENTS.innerHTML = " ";
}