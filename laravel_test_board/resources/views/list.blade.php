@extends('layout.layout')

@section('title','List')

@section('main')

<main class=" justify-content-center">
<div id="carouselExampleIndicators" class="carousel slide w-75 h-75 m-auto" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <a href="https://www.bnkrmall.co.kr/board/hobby_content.do?idx=89">
        <img src="/img/gundam20th.jpg" class="d-block w-100" alt="slide1">
      </a>  
    </div>
    <div class="carousel-item">
      <a href="https://www.shinhancard.com/pconts/html/benefit/event/1223761_2239.html">
        <img src="/img/gundamRX-78.jpg" class="d-block w-100" alt="slide2">
      </a>
    </div>
    <div class="carousel-item">
      <a href="https://kr.gundam.info/content/mgsd/002/">
        <img src="/img/MGSD2_1280x720_kr.jpg" class="d-block w-100" alt="slide3">
      </a>
    </div>
    <div class="carousel-item">
      <a href="{!! 'https://www.bnkrmall.co.kr/board/hobby_content.do?idx=106' !!}">
        <img src="/img/20주년어스트레이_건담인포_1280x720px.jpg" class="d-block w-100" alt="slide4" >
      </a>
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
</main>
@forelse($data as $item)
<section>
<div class="card" >
		
		<div class="card-body">
			<h5 class="card-title">{{$item->u_title}}</h5>
			 <p class="card-text">{{$item->u_content}}</p>
			<a  href="{{route('board.show',['board'=>$item->u_id])}}" class="btn btn-primary">상세보기</a>
		</div>
       
</div>
</section>
@empty
<div>
    게시글 없음
</div>
@endforelse
@endsection