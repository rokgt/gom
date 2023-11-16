@extends('layout.layout')

@section('title','Create')

@section('main')


<form action="{{route('board.store')}}" method="post">
	
	@csrf
	<div class="mb-3">
		<label for="b_title" class="form-label">제목</label>
		<input type="text" name="b_title" class="form-control" id="b_title" autocomplete="off">
	</div>
	<div class="mb-3">
		<label for="b_content" class="form-label">내용</label>
		<textarea rows="10" cols="40" name="b_content" class="form-control" id="b_content" autocomplete="off"></textarea>
	</div>
	<button type="submit" class="btn btn-primary">작성</button>
	<a href="{{route('board.index')}}">취소</a>
</form>

@endsection