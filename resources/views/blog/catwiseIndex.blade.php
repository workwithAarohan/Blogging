@extends('layouts.sidebar')

@section('title')
    {{$blog->catTitle}}
@endsection

@section('content')
    <div class="container   ">
        <h4 class="mt-1"> <b> {{$blog->catTitle}} </b></h4>
        @foreach($blog as $value)
            <div class="row justify-content-center p-4 my-4 bg-white shadow-sm rounded ml-5 w-75">
                <div class="col-md-5">
                    <a href="{{URL::to('/blog/'.$value->id)}}">
                        <img src="/image/{{$value->image}}" class="w-100" style="height: 160px;"> 
                    </a>
                </div>
                <div class="col">
                    <h4 class="mb-0"> <b>{{$value->title}}</b></h4>
                    <small class="text-muted">{{$value->created_at->format('d-M-Y, h:i A')}}</small> &emsp;
                    @for($i=1;$i<=5;$i++)
                        @if($i <= $value->average)
                            <i class="fa fa-star fill"></i>
                        @else
                            <i class="fa fa-star"></i>
                        @endif
                    @endfor
                    <p class="mt-3"> {{$value->description}} </p> 
                </div>
            </div>
        @endforeach
    </div>
@endsection

lorem