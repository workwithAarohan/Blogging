@extends('layouts.sidebar')

@section('title')
    Blog
@endsection

@section('content')
    <div class="container">
        
        @foreach($blog as $value)
            <div class="row justify-content-center p-4 my-4 bg-white shadow-sm rounded">
                <div class="col">          
                    <a href="{{URL::to('/blog/'.$value->id)}}">
                        <img src="/image/{{$value->image}}" class="w-100"> 
                    </a>
                </div>
                <div class="col">
                    <h3 class="mb-0"> <b>{{$value->title}}</b></h3>
                    <small class="text-muted">{{$value->created_at->format('d-M-Y, h:i A')}}</small>
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