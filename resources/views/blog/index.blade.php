@extends('layouts.sidebar')

@section('title')
    Blog
@endsection

@section('content')
    <div class="container   ">
        <h4 class="mt-1"> <b>Recent Blogs:</b></h4>
        @foreach($recent as $value)
            @foreach($value->category as $category)
                <div class="row justify-content-center p-4 my-4 bg-white shadow-sm rounded ml-5 w-75">
                    <div class="col-md-5">
                        <a href="{{URL::to('/blog/'.$value->id)}}">
                            <img src="/image/{{$value->image}}" class="w-100" style="height: 160px;"> 
                        </a>
                    </div>
                    <div class="col-md-7">
                        <h4 class="mb-0"> <b>{{$value->title}}</b></h4>
                        <a href="{{URL::to('cat/'.$category->id.'/blog')}}">
                            <span class="badge badge-secondary" style="padding:5px;">
                                <b>{{$category->title}}</b>
                            </span>
                        </a>
                         &emsp;
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
        @endforeach
        <h4 class="mt-1"> <b>Top Rated:</b></h4>
        @foreach($blog_topRated as $value)
            @foreach($value->category as $category)
                <div class="row justify-content-center p-4 my-4 bg-white shadow-sm rounded ml-5 w-75">
                    <div class="col-md-5">
                        <a href="{{URL::to('/blog/'.$value->id)}}">
                            <img src="/image/{{$value->image}}" class="w-100" style="height: 160px;"> 
                        </a>
                    </div>
                    <div class="col">
                        <h3 class="mb-0"> <b>{{$value->title}}</b></h3>
                        <span class="badge badge-secondary" style="padding:5px;">
                            <b>{{$category->title}}</b>
                        </span>
                         &emsp;
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
        @endforeach
    </div>
@endsection