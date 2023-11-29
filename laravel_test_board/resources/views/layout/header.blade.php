<header>
	<div class="container-fluid" id="img_logo">
		<a class="navbar-brand " href=""><img src="/img/logo_gundaminfo.png" alt=""></a>
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
          <a class="nav-link active" aria-current="page" href="#">News</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Movie</a>
        </li>        
        <li class="nav-item">
          <a class="nav-link" href="#">products</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="#">About Gundam</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="#">Shop</a>
        </li>
      </ul>
    </div>
  </div>
</nav>	  
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		
		  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  
		
		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
			  
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				  게시판
				</a>
				<ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
				  <li><a class="dropdown-item" href="./free.html">자유게시판</a></li>
				  <li><a class="dropdown-item" href="./question.html">질문 게시판</a></li>
				</ul>
			  </li>
			  <a href="{{route('user.logout.get')}}" class=" btn btn-dark" role="button" >로그아웃</a>
			</ul>
			
		  </div>
		
	  </nav>
	  @endauth
	  @guest
	  
	  @endguest
	</header>