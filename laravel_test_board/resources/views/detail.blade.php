@extends('layout.layout')

@section('title','Detail')

@section('main')

<main>
	
	<div class="mb-3">
		<p>글번호</p>
        <p>{{$data->u_id}}</p>
	</div>
	<div class="mb-3">
        <p>제목</p>
        <p>{{$data->u_title}}</p>
	</div>
    <div class="mb-3">
        <p>내용</p>
        <p>{{$data->u_content}}</p>
	</div>
    <div class="mb-3">
        <p>작성일</p>
        <p>{{$data->created_at}}</p>
	</div>
    <div class="mb-3">
        <p>수정일</p>
        <p>{{$data->updated_at}}</p>
	</div>
			
	
		 
	</main>
    <a class="btn btn-secondary" href="{{url()->previous()}}">취소</a>
	<button type="submit" class="btn btn-dark float-end">수정</button>

@endsection