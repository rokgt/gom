@extends('layout.layout')

@section('title','Detail')

@section('main')

<h1>도비는 자유예요</h1>
<a href="{{route('board.create')}}" class="btn btn-primary">글작성</a>
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