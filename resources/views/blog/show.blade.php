@extends('layouts.app')

@section('title')
    {{$blog->title}}
@endsection

@section('content')
    <div class="container">
        
        <h3> {{$blog->title}} </h3>

        <img src="/image/{{$blog->image}}" class="w-75">

        <p> {{$blog->content}} </p>

        <div class="row p-3 mb-3">
            @auth 
                <div class="col-md-1">
                    <img src="/image/{{Auth::user()->image}}" style="width:50px; height:50px; border-radius:50%;">
                </div>
                <div class="col-md-6">
                    <form action="{{URL::to('feedback/store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="blog_id" value="{{$blog->id}}">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <input type="text" class="form-control" name="comment" placeholder="Add a comment" required>
                        <select name="rating">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <button type="submit" class="btn border">Add Review <i class="fas fa-plus"></i></button>
                    </form>
                </div>
            @else
                <div class="col border p-2">
                    <p><a href="{{URL::to('/login')}}">Login</a> to review.</p>
                </div>
            @endauth
        </div>
        @foreach($feedback as $value)
            <div class="row p-3 bg-light mb-2">
                @foreach($value->user as $user)
                    <div class="col-md-8">
                        <a href="{{URL::to('profile/'.$user->image)}}" style="text-decoration: none;"> 
                            {{$user->name}} &ensp;&emsp;
                        </a>
                        <br>
                        <p>{{$value->comment}}</p>
                        <a href="{{URL::to('/feedback/edit/'.$value->id)}}" class="border-right pr-2 mr-2">Edit</a>
                        <a href="{{URL::to('/feedback/delete/'.$value->id)}}">Delete</a>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection