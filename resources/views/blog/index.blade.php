@extends('layouts.app')

@section('title')
    Blog
@endsection

@section('content')
    <div class="container">
        
        @foreach($blog as $value)
            <div class="row justify-content-center pb-4">
                <div class="col">          
                    <a href="{{URL::to('/blog/'.$value->id)}}">
                        <img src="/image/{{$value->image}}" class="w-100">
                    </a>
                </div>
                <div class="col">
                    <h3> {{$value->title}} </h3> 
                    <p> {{$value->description}} </p>
                    <a href="{{URL::to('/blog/'.$value->id.'/edit')}}" class="btn btn-success mr-1">
                        Edit
                    </a> 
                    <a href="{{URL::to('/del_blog/'.$value->id)}}" class="btn btn-danger">
                        Delete
                    </a> 
                </div>
            </div>
        @endforeach
    </div>
@endsection