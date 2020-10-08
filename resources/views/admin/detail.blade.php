@extends('layouts.sidebar')

@inject('review','App\Feedback')

@section('title')
    {{$user->name}}
@endsection



@section('content')
    <div class="container mt-3">
        <div class="row p-5 shadow-sm rounded bg-white">
            <div style="width:90px;">
                <img src="/image/{{$user->image}}" style="width:90px; border-radius:50%">
            </div>
            <div class="col-md-6 mt-3">
                <h4>{{$user->name}}</h4>
                <p>{{$user->email}}</p>
            </div>
        </div>


        <div class="row mt-4 justify-content-center">
            <div class="col-md-5 border mr-4 p-3 shadow-sm bg-white rounded"
            style="height: 500px;">

                <h4>My Collection</h4>
                <div class="row justify-content-around">
                @foreach($blog as $value)
                    <div class="col-md-3 mb-2 border">
                        <img src="/image/{{$value->image}}" style="width: 110px; height: 120px;">
                    </div>
                @endforeach
                </div>
            </div>
                
            
            <div class="col-md-6 " style="height:610px; overflow-x: hidden;
            scrollbar-display:none;">


            <div class="row mb-3 p-3 border shadow-sm bg-white rounded border-radius: 50%;">
                <h4>Write a blog</h4>
                <a href="{{Route('blog.create')}}" class="btn border rounded" style="width: 100%; height: 40px; text-align:left;
                background-color: lightgrey; border-radius: 30%">
                    Create a blog
                </a>
            </div>
            @foreach($blog as $value)
            <div class="row justify-content-center pb-4 mt-4 border shadow-sm bg-white rounded">
                

                <div class="col p-3">    
                    <h3> <b>{{$value->title}}</b> </h3>
                    <p style="font-size: 20px;"> {{$value->description}} </p>      
                    <a href="{{URL::to('/blog/'.$value->id)}}">
                        <img src="/image/{{$value->image}}" class="w-100 mb-3"> 
                    </a>
                    <hr>
                    <div class="d-flex border-bottom justify-content-between">
                        <h5 >Comments</h5>
                        <p>{{$review->where('blog_id',$value->id)->count()}} comments</p>
                    </div>
                    @foreach($value->feedback as $feedback)
                        @foreach($feedback->user as $user)
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="/image/{{$user->image}}" style="width:50px; height:50px; border-radius:50%;">
                                </div>
                                <div class="col mt-2 ">
                                    <b> {{$user->name}} </b> Rating: {{$feedback->rating}}
                                    <p> {{$feedback->comment}} </p>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>

                <!-- <div class="col">
                    <h3> {{$value->title}} </h3> 
                    <p> {{$value->description}} </p>
                    <a href="{{URL::to('/blog/'.$value->id.'/edit')}}" class="btn btn-success mr-1">
                        Edit
                    </a> 
                    <a href="{{URL::to('/del_blog/'.$value->id)}}" class="btn btn-danger">
                        Delete
                    </a> 
                </div> -->
            </div>
        @endforeach
            </div>
        </div>

        

    </div>
@endsection
