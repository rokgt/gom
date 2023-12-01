@extends('layouts.app')

@section('content')
    <form action="{{ route('image.upload') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image">
        <button type="submit">Upload</button>
    </form>
@endsection