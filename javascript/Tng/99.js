
const BTN_CALL=document.querySelector('#btn-call');
BTN_CALL.addEventListener('click',call)
function call(){
	const INPUT_TXT=document.querySelector('#input-txt');
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
	data.forEach(item=>{
		const ARTICLE=document.createElement('div');
		const ARTICLE_ID=document.createElement('div');
		const ARTICLE_IMG=document.createElement('img');

		ARTICLE.classList='article';
		ARTICLE_ID.classList='article-id';
		ARTICLE_IMG.classList='article-img';

		ARTICLE_ID.innerHTML=item.id;
		ARTICLE_IMG.setAttribute('src',item.download_url);

		ARTICLE.appendChild(ARTICLE_ID);
		ARTICLE.appendChild(ARTICLE_IMG);
		const DIV_IMG=document.querySelector('.div-img');
		DIV_IMG.appendChild(ARTICLE);
	});
}




const BTN_RMV= document.querySelector('#btn-rmv');
BTN_RMV.addEventListener('click',imgClear);
function imgClear(){
	const DIV_IMG = document.querySelector('.div-img');
	
	DIV_IMG.innerHTML = " ";
}