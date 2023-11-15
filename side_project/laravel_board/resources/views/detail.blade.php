@extends('layout.layout')

@section('title','Detail')

@section('main')



<p>{{$data->b_title}}</p>
<p>{{$data->b_content}}</p>
<p>{{$data->created_at}}</p>
<p>{{$data->updated_at}}</p>


@endsection