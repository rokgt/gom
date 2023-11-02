<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/view/css/common.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>자유게시판</title>
</head>
<body>
<?php require_once("view/inc/header.php"); ?>
	<div class="mt-5 mb-5 text-center">
		<h1>자유게시판</h1>
		<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16" data-bs-toggle="modal" data-bs-target="#modalInsert">
			<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z "/>
		  </svg>
	</div>

	<!-- <div id="modal" class="displayNone">
		<div id="modalW"></div>
		<button id="btnModalClose">닫기</button>
	</div> -->

	<main>
		<div class="card" >
			<img src="https://picsum.photos/200/300.jpg" class="card-img-top" alt="...">
			<div class="card-body">
			  <h5 class="card-title">Card title</h5>
			  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			  <button  href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetail">상세보기</button>
			</div>
		  </div>
		  <div class="card" >
			<img src="https://picsum.photos/200/300.jpg" class="card-img-top" alt="...">
			<div class="card-body">
			  <h5 class="card-title">Card title</h5>
			  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			  <button  href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetail">상세보기</button>
			</div>
		  </div><div class="card" >
			<img src="https://picsum.photos/200/300.jpg" class="card-img-top" alt="...">
			<div class="card-body">
			  <h5 class="card-title">Card title</h5>
			  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			  <button  href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetail">상세보기</button>
			</div>
		  </div>
		  <div class="card" >
			<img src="https://picsum.photos/200/300.jpg" class="card-img-top" alt="...">
			<div class="card-body">
			  <h5 class="card-title">Card title</h5>
			  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			  <button  href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetail">상세보기</button>
			</div>
		  </div>
		  <div class="card" >
			<img src="https://picsum.photos/200/300.jpg" class="card-img-top" alt="...">
			<div class="card-body">
			  <h5 class="card-title">Card title</h5>
			  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			  <button  href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetail">상세보기</button>
			</div>
		  </div>
	  
	</main>

  
  <!-- 상세Modal -->
  <div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel">새끼냥냥이</h5>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<span>내머리 속의 지우개 </span>
			<br>
			<img src="./cat.jpg" alt="">
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
		  
		</div>
	  </div>
	</div>
  </div>
  <!-- 작성Modal -->
  <div class="modal fade" id="modalInsert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog ">
	  <div class="modal-content">
		<form action="">
			<div class="modal-header">
				<input type="text" class="form-control"  placeholder="제목을 입력하세요">
				
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<textarea class="form-control" cols="10" rows="10" placeholder="내용을 입력하세요"></textarea>
				<br><br>
				<input type="file" accept="image/*"> <!--이미지 파일만 부르고 싶을때-->
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
			<button type="button" class="btn btn-primary" data-bs-dismiss="modal">작성</button>
			</div>
		</form>
	  </div>
	</div>
  </div>
	<footer class="bg-dark fixed-bottom text-light text-center p-3">
		저작권
	</footer>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="/view/js/common.js"></script>
</body>
</html>