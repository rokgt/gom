@extends('layout.layout')

@section('title','List')

@section('main')

<main class=" justify-content-center h-75">
<div id="carouselExampleIndicators" class="carousel slide w-75 h-75 m-auto" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/img/gundam20th.jpg" class="d-block w-100" alt="">
    </div>
    <div class="carousel-item"><a href="{!! 'https://www.bnkrmall.co.kr/board/hobby_content.do?idx=106' !!}">
      <img src="/img/gundamRX-78.jpg" class="d-block w-100" alt="..."></a>
    </div>
    <div class="carousel-item">
      <img src="/img/MGSD2_1280x720_kr.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="/img/20주년어스트레이_건담인포_1280x720px.jpg" class="d-block w-100" alt="..." href="https://www.bnkrmall.co.kr/board/hobby_content.do?idx=106">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
@forelse($data as $item)
<div class="card" >
		
		<div class="card-body">
			<h5 class="card-title">Card title</h5>
			 <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			<button  href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetail">상세보기</button>
		</div>
       
</div>
@empty
<div>
    게시글 없음
</div>
@endforelse

</main>
@endsection