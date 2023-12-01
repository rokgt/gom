@extends('layout.layout')
@section('title', 'mainpage')
@section('main')
@guest
<a href="{{route('user.regist.get')}}" class="btn btn-dark float-end" role="button"  >회원가입</a>
<a href="{{route('user.logout.get')}}" class="btn btn-dark" role="button" >로그인</a>
@endguest
<main class="d-flex justify-content-center h-75">

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
    <a href="https://www.bnkrmall.co.kr/board/hobby_content.do?idx=89">
      <img src="/img/gundam20th.jpg" class="d-block w-100" alt=""></a>
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


@endsection