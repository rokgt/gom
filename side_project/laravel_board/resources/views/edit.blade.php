@extends('layout.layout')

@section('title', 'edit')

@section('main')

<form action="{{route('board.update',['board'=>$data->b_id])}}" method="post">
@csrf
@method('PUT')
<label for="b_title">제목</label>
<input type="text"id="b_title" name="b_title" value="{{$data->b_title}}">

<label for="b_content">내용</label>
<textarea name="b_content" id="b_content" cols="30" rows="10" >{{$data->b_content}}</textarea>
<button type="summit">수정완료</button>
{{-- <a href="{{route('board.index')}}">수정완료</a> --}}
<a href="{{route('board.show',['board'=>$data->b_id])}}">취소</a>

</form>


@endsection