@extends('layouts.app')

@section('title')
    {{$blog->title}}
@endsection

<style>
.rating { 
    border: none;
    float: left;
}

.rating > input { 
    display: none; 
} 
.rating > label:before { 
    margin: 5px;
    font-size: 1.25em;
    font-family: FontAwesome;
    display: inline-block;
    content: "\f005";
}
.rating > label { 
    color: #D3D3D3; 
    float: right; 
}
.rating > input:checked ~ label,
.rating:not(:checked) > label:hover,
.rating:not(:checked) > label:hover ~ label {
     color: #FFDF00;
}
.rating > input:checked + label:hover,
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label,
.rating > input:checked ~ label:hover ~ label { 
    color: #FFED85;  
}
</style>

@section('content')
    <div class="container">
        
        <h3> {{$blog->title}} </h3>

        <img src="/image/{{$blog->image}}" class="w-75 mb-3">

        <p> {{$blog->content}} </p>

        <div class="row p-3 mb-3 border-top">
            @auth 
                <div class="col-md-1">
                    <img src="/image/{{Auth::user()->image}}" class="mt-4 ml-2 border rounded-circle" style="width:60px;height:60px;">
                </div>
                <div class="col-md-6">
                    <form action="{{URL::to('feedback/store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="blog_id" value="{{$blog->id}}">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <div class="rating">
                        <input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
                        <input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
                        <input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
                        <input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
                        <input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
                        </div>
                        <input type="text" class="form-control mb-1" name="comment" placeholder="Add a comment" required>
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
            <div class="row p-3 bg-light mb-2 border-top">
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