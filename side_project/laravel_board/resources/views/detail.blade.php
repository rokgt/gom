@extends('layout.layout')

@section('title','Detail')

@section('main')
<main class="d-flex justify-content-center align-items-center h-75">
	<div class="mb-3">
		<p>글번호</p>
		<p>{{$data->b_id}}</p>

	</div>

	<div class="mb-3">
			<p>제목</p>
			<p>{{$data->b_title}}</p>

	</div>

	<div class="mb-3">
		<p>내용</p>
		<p>{{$data->b_content}}</p>
	</div>

	<div class="mb-3">
		<p>조회수</p>
		<p>{{$data->b_hits}}</p>
	</div>

	<div class="mb-3">
		<p>작성일</p>
		<p>{{$data->created_at}}</p>
	</div>
	
	<div class="mb-3">
		<p>수정일</p>
		<p>{{$data->updated_at}}</p>
	</div>
	<form action="{{route('board.destroy',['board' => $data->b_id])}}" method="post">
		@csrf
		@method('delete')		
		<button type="submit" class="btn btn-dark">삭제</button>
	</form>
</main>









@endsection