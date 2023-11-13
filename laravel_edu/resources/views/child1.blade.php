{{-- 상속 --}}

@extends('inc.layout')


{{-- section : 부모 템플릿에 해당하는 yield 부분에 삽입 --}}
@section('title','자식1 타이틀')

{{-- @section ~ @endsection : 처리해야 될 코드가 많을 경우 --}}

@section('main')

<h2>자식1화면입니다</h2>
<p>여러 데이터를 표시합니다.</p>
<hr>

{{-- 조건문 --}}

	@if ($gender === '0')
		<span>남자</span>		
	@elseif($gender === '1')
		<span>여자</span>
	@else
		<span>기타</span>
@endif
<hr>

{{-- 반복문 --}}

@for($i = 0; $i < 5; $i++)
	<span> {{$i}} </span>
@endfor	

<hr>
{{-- foreach와 forelse의 경우, $loop변수가 생성되고 사용 할 수 있다 --}}
<h3>foreach</h3>
@foreach($data as $key=> $val)
		<p>{{$loop->count.' >> ' .$loop->iteration}}</p>
		<span>{{$key.':'.$val}}</span>
		<br>
@endforeach

<hr>
<h3>forelse</h3>
@forelse ($data2 as $key => $val)
<span>{{$key.':'.$val}}</span>
	<br>
@empty
	<span>빈배열입니다.</span>
	
@endforelse


@endsection

{{-- 부모 show테스트용 --}}

@section('show')
<h3>자식1 show입니다</h3>
<p>자식111111111111111</p>
@endsection