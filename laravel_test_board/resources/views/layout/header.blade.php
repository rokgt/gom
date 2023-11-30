<header>
	<div class="container-fluid" id="img_logo">
		<a class="navbar-brand " href="{{route('mainpage.get')}}"><img src="/img/logo_gundaminfo.png" alt=""></a>
	</div> 	
	
	@auth
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">	
  	<div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
	  
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="https://kr.gundam.info/news.html">News</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://kr.gundam.info/movies.html">Movie</a>
        </li>        
        <li class="nav-item">
          <a class="nav-link" href="https://www.bnkrmall.co.kr/main/index.do">products</a>
        </li>
		<li class="nav-item">
				<a class="nav-link" href="https://kr.gundam.info/about-gundam/series-pages.html">
				 About Gundam
				</a>				
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				Shop
				</a>
				<ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
				  <li><a class="dropdown-item" href="https://www.bnkrmall.co.kr/main/gunpla_index.do">반다이 남코 코리아몰</a></li>
				  <li><a class="dropdown-item" href="https://cafe.naver.com/gbasekorea">건담 베이스</a></li>
				</ul>
			  </li>
      </ul>
	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
			  
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				  게시판
				</a>
				<ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
				  <li><a class="dropdown-item" href="{{route('freelist.get')}}">자유게시판</a></li>
				  <li><a class="dropdown-item" href="{{route('questionlist.get')}}">질문 게시판</a></li>
				</ul>
			  </li>
			  
			</ul>
			<a href="{{route('user.logout.get')}}" class=" btn btn-dark" role="button" >로그아웃</a>
		  </div>
    </div>
  </div>
</nav>	  
	
	  @endauth
	  
	</header>