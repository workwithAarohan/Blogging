@extends('layouts.app')

@section('title')
    {{$blog->title}}
@endsection

@section('content')
    <div class="container">
        
        <h3> {{$blog->title}} </h3>

        <img src="/image/{{$blog->image}}" class="w-75">

        <p> {{$blog->content}} </p>

    </div>
@endsection