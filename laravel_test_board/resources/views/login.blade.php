@extends('layout.layout')

@section('title','Login')

@section('main')

<main class="d-flex justify-content-center align-items-center h-75">
	
		<form method="POST"  action="{{route('user.login.post')}}" style="width: 300px;">
		@include('layout.errorlayout')
        @csrf
		
			<div class="mb-3">
			  <label for="email" class="form-label">이메일</label>
			  <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
			  
			</div>
			<div class="mb-3">
			  <label for="password" class="form-label">비밀번호</label>
			  <input type="password" class="form-control" id="password" name="password">
			</div>
			
			<a class="btn btn-secondary" href="{{url()->previous()}}">취소</a>
			<button type="submit" class="btn btn-dark float-end">로그인</button>
		  </form>
	</main>


@endsection