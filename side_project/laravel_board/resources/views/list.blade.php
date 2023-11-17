@extends('layout.layout')

@section('title','List')

@section('main')
<main>
	<div><a href="{{route('board.create')}}">작성</a></div>
	<div>
		@forelse ($data as $item)
		
	
		
		<div class="card" >		
		<div class="card-body">
			<h5 class="card-title">{{$item->b_title}}</h5>
			<p class="card-text">{{$item->b_content}}</p>
			<a  href="{{route('board.show',['board'=>$item->b_id])}}" class="btn btn-primary">상세</a>
		</div>
		</div>
	</div>
	@empty
	<div>게시글 없음</div>
	@endforelse
	
</main>
@endsection	