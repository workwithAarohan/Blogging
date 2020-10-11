@extends('layouts.sidebar')
@inject('review','App\Feedback')
@section('title')
    {{$user->name}}
@endsection
<style>
.fa-star{
    color:#D3D3D3;
}
.fill{
    color:#FFDF00;
}
.gallery{
    height:85vh;
    width:45%;
    position: sticky;
    top:0;
    margin-right:0.5rem;
    overflow:hidden;
}
.gallery-img{
    margin:3.8px;
}
.blogs{
    width:51%;
    margin-left:1.5rem;
}
@media only screen and (max-width:992px){
    .gallery{
        width:100%;
        position:static;
        margin-right:0;
    }
    .blogs{
        width:100%;
        margin-left:0;
    }
    .create{
        margin-top:20px;
    }
    .gallery-img{

    }
}
</style>

@section('content')
    <div class="container mt-3">
        <div class="row p-5 shadow-sm rounded bg-white">
            <div style="width:100px;">
                <img src="/image/{{$user->image}}" class="border rounded-circle w-100">
            </div>
            <div class="mt-3 ml-2">
                <h4>{{$user->name}}</h4>
                <p>{{$user->email}}</p>
            </div>
        </div>


        <div class="row mt-4 d-flex">
            <div class="border p-3 shadow-sm bg-white rounded gallery">

                <h4>My Collection</h4>
                <div class="row">
                    @foreach($blog as $value)
                        <div class="border gallery-img">
                            <img src="/image/{{$value->image}}" width="160px" height="130px">
                        </div>
                    @endforeach
                </div>
            </div>
                    
                
            <div class="blogs">
                <div class="row mb-3 p-4 shadow-sm bg-white rounded create">
                    <h4>Write a blog</h4>
                    <button type="button" class="btn border rounded-pill text-muted" data-toggle="modal" data-target="#createblog" style="width: 100%; height: 40px; text-align:left;
                    background-color: lightgrey; border-radius: 30%">
                    Create a blog
                    </button>
                    <div class="modal fade" id="createblog" tabindex="-1" aria-labelledby="createblog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Create blog</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{URL::to('blog')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Content</label>
                                        <textarea class="form-control" id="description" name="content"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <input type="text" class="form-control" id="content" name="description">
                                    </div>
                                    <div class="form-group">
                                        <label for="image">image</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                    </div>
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select name="cat_id">
                                            @foreach($category as $value)
                                                <option value="{{$value->id}}">{{$value->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                <button class="btn btn-success" type="submit">Add</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                @foreach($blog as $value)
                    <div class="row justify-content-center pb-4 mt-4 border shadow-sm bg-white rounded">
                        

                        <div class="col p-3">    
                            <h3 class="mb-0"> <b>{{$value->title}}</b></h3>
                            <small class="text-muted">{{$value->created_at->format('d-M-Y, h:i A')}}</small>
                            <p style="font-size: 18px;margin:0.5rem 0"> {{$value->description}}</p>      
                            <a href="{{URL::to('/blog/'.$value->id)}}">
                                <img src="/image/{{$value->image}}" class="w-100 mb-2"> 
                            </a>
                            <hr>
                            <div class="d-flex border-bottom justify-content-between">
                                <p class="h5">Comments</p>
                                <a class="btn p-0" data-toggle="modal" data-target="#showcomment">
                                {{$review->where('blog_id',$value->id)->count()}} comments
                                </a>
                                <div class="modal fade" id="showcomment" tabindex="-1" aria-labelledby="commentlist" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Comments</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    @foreach($value->feedback as $feedback)
                                        @foreach($feedback->user as $user)
                                        <div class="row mt-2 border-bottom">
                                            <div class="p-2 ml-3">
                                                <img src="/image/{{$user->image}}" class="border rounded-circle" style="width:45px;height:45px;">
                                            </div>
                                            <div class="mt-2">
                                                <b>{{$user->name}}</b>
                                                <span class="ml-1">(
                                                @for($i=1;$i<=5;$i++)
                                                    @if($i <= $feedback->rating)
                                                        <i class="fa fa-star fill"></i>
                                                    @else
                                                        <i class="fa fa-star"></i>
                                                    @endif
                                                @endfor)
                                                </span>
                                                <p> {{$feedback->comment}} </p>
                                            </div>
                                            </div>
                                        @endforeach
                                    @endforeach
                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @foreach($value->feedback as $feedback)
                                @foreach($feedback->user as $user)
                                    <div class="row mt-2 border-bottom">
                                        <div class="p-2 ml-3">
                                            <img src="/image/{{$user->image}}" class="border rounded-circle" style="width:45px;height:45px;">
                                        </div>
                                        <div class="mt-2">
                                            <b>{{$user->name}}</b>
                                            <span class="ml-1">(
                                            @for($i=1;$i<=5;$i++)
                                                @if($i <= $feedback->rating)
                                                    <i class="fa fa-star fill"></i>
                                                @else
                                                    <i class="fa fa-star"></i>
                                                @endif
                                            @endfor)
                                            </span>
                                            <p> {{$feedback->comment}} </p>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
