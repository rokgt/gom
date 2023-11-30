@extends('layout.layout')

@section('title','Detail')

@section('main')
<main class="d-flex justify-content-center align-items-center h-75">
		
		<form method="POST" style="width: 300px;" action="{{route('board.store')}}">
			@include('layout.errorlayout')
			@csrf
            <label for="board">게시판 선택:</label>
            <select name="board" id="board">
                <option value="freelist">자유게시판</option>
                <option value="questionlist">질문 게시판</option>
            </select>
			
			
			<div class="mb-3">
			  <label for="u_title" class="form-label">제목</label>
			  <input type="text" class="form-control" id="u_title" name="u_title">
			  <!-- 이메일 인증 해보기 -->
			</div>
			
            <div class="mb-3">
			<label for="u_content" class="form-label">내용</label>			  
            <textarea name="u_content" id=u_content"" cols="30" rows="10"></textarea>
			</div>
			
            <a class="btn btn-secondary" href="{{url()->previous()}}">취소</a>
			<button type="submit" class="btn btn-dark float-end">작성완료</button>
		  </form>
	</main>

@endsection