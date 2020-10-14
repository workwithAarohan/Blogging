@extends('layouts.app')

@section('title')
    {{$blog->title}}
@endsection

<style>

.fa-star{
    color:#D3D3D3;
}
    .fill{
        color:#F07D55 ;
    }
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
     
     color: #F07D55;
}
.rating > input:checked + label:hover,
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label,
.rating > input:checked ~ label:hover ~ label { 
    color: #b04621;
}
</style>

@section('content')
    <div class="container-fluid">
        <div class="row mx-2 justify-content-center">
            <div class="col-md-8 bg-white mt-2 p-3 border-right ">
                <h3> {{$blog->title}} </h3>

                <img src="/image/{{$blog->image}}" class=" mb-3 " style="width: 100%; height: 380px;">

                <p> {{$blog->content}} </p>
            </div>

            <div class="col-md-4 mt-2 p-3 bg-white shadow-sm">
                <h5> <b>Description:</b> </h5>
                <p> {{$blog->description}} </p>

                @auth 
                    <div class="row mb-3">
                        <div class="col-3">
                            <img src="/image/{{Auth::user()->image}}" class="mt-3 border rounded-circle" style="width:60px;height:60px;">
                        </div>
                        <div class="col">
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
                            </form>
                        </div>
                    </div>
                @else
                    <div class="col border p-2">
                        <p><a href="{{URL::to('/login')}}">Login</a> to review.</p>
                    </div>
                @endauth

                <h5> <b>Review:</b> </h5>

                @foreach($feedback as $value)
                    <div class="row p-3  mb-2 border-top">
                        @foreach($value->user as $user)
                            
                            <div class="col-md-2">
                                <img src="/image/{{$user->image}}" class="border rounded-circle" style="width:45px;height:45px;">
                            </div>
                            <div class="col-md-9">
                                <a href="{{URL::to('user/detail/'.$user->id)}}" style="text-decoration: none;"> 
                                    <b>{{$user->name}}</b>
                                </a>
                                <span class="ml-1">(
                                    @for($i=1;$i<=5;$i++)
                                        @if($i <= $value->rating)
                                            <i class="fa fa-star fill"></i>
                                        @else
                                            <i class="fa fa-star"></i>
                                        @endif
                                    @endfor)
                                </span>
                                <p> {{$value->comment}} </p>
                                <a href="{{URL::to('/feedback/edit/'.$value->id)}}" class="border-right pr-2 mr-2">Edit</a>
                                <a href="{{URL::to('/feedback/delete/'.$value->id)}}">Delete</a>
                            </div>
                        @endforeach
                    </div>
                @endforeach

            </div>
        </div>
        
    </div>
@endsection