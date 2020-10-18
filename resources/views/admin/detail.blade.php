@extends('layouts.sidebar')
@inject('review','App\Feedback')
@section('title')
    {{$user->name}}
@endsection
<style>
.gallery{
    height:85vh;
    width:45%;
    position: sticky;
    top:0;
    margin-right:0.5rem;
    overflow:hidden;
}
.gallery-img{
    padding:10px;
    display:grid !important;
    grid-template-columns: 1fr 1fr 1fr;
    grid-gap:10px;
}
.blogs{
    width:51%;
    margin-left:20px;
}
.fa-ellipsis-v{
    color:#B4B4B4;
    transition: 0.2s all;
}
.fa-ellipsis-v:hover{
    transform: scale(1.5);
    color:#000000;
    cursor:pointer;
}
@media only screen and (max-width:992px){
    .gallery{
        width:100%;
        position:static;
        margin-right:0;
    }
    .blogs{
        width:95%;
        margin-left:15px;        
    }
    .create{
        margin-top:20px;
    }
    .gallery-img{
    grid-template-columns: 1fr 1fr 1fr 1fr;
    }
}
@media only screen and (max-width:600px){
    .gallery-img{
        grid-template-columns: 1fr 1fr;
    }
}
</style>

@section('content')
    <div class="container-fluid mt-2">
        <div class="row p-3 p-md-5 shadow-sm rounded bg-white m-0 text-center">
            <div class="col-md-2">
                <img src="/image/{{$user->image}}" class="border rounded-circle" style="width:100px;">
                
            </div>
            <div class="col-md-3 mt-2">
                <h4><b>{{$user->name}}</b></h4>
                <p>{{$user->email}}</p>
            </div>
            <div class="col-md-3 offset-md-1 justify-content-center">
                <h4>Total Blogs : <br> 
                    <span class="badge badge-primary" style="padding-top: 25px; text-align:center; width: 7rem; height: 5rem; font-size: 2.4rem; ">
                       {{$blog->count}}
                    </span>
                </h4>
            </div>
            <div class="col-md-3 ">
                <h3><b>Overall Rating</b></h3>
                @for($i=1;$i<=5;$i++)
                    @if($i <= $user->average)
                        <i class="fa fa-star fill" style="font-size: 1.5rem;"></i>
                    @else
                        <i class="fa fa-star" style="font-size: 1.5rem;"></i>
                    @endif
                @endfor
                <hr>
                <h5>Total review : <span class="badge badge-secondary">{{$user->rating}}</span></h5>
            </div>
        </div>

        <div class="row m-0 mt-3">
            <div class="border p-3 shadow-sm bg-white rounded gallery">

                <h4>My Collection</h4>
                <div class="row gallery-img">
                    @foreach($blog as $value)
                        <div class="border text-center">
                            <a href="{{URL::to('/blog/'.$value->id)}}">
                                <img src="/image/{{$value->image}}" title="{{$value->title}}" class="img-fluid" 
                                style="height: 100px;" >
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
                    
                
            <div class="blogs">
                @if($user->id == Auth::user()->id)
                    <div class="row mb-3 p-4 shadow-sm bg-white rounded create">
                        <h4>Write a blog</h4>
                        <button type="button" class="btn border rounded-pill text-muted" data-toggle="modal" data-target="#createblog" style="width: 100%; height: 40px; text-align:left;
                        background-color: lightgrey; border-radius: 30%">
                        Create a blog
                        </button>
                        <div class="modal fade" id="createblog" tabindex="-1" aria-labelledby="createblog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" style="max-width: 850px!important;">
                                <div class="modal-content" style="">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Create blog</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{URL::to('blog')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                                        <div class="form-inline">
                                            <label for="image">Image: &emsp;</label> 
                                            <input type="file" multiple accept='image/*' name="image" style="width: 450px; ">

                                            <label for="category">Category: &emsp;</label>
                                            <select name="cat_id" class="form-control">
                                                @foreach($category as $value)
                                                    <option value="{{$value->id}}">{{$value->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <br>

                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" id="title" name="title">
                                        </div>
                                        <div class="form-group">
                                            <label for="content">Content</label>
                                            <textarea class="form-control" id="description" name="content" rows="4"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <input type="text" class="form-control" id="content" name="description">
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
                @endif

                @foreach($blog as $value)
                    <div class="row justify-content-center pb-4 mb-3 border shadow-sm bg-white rounded">

                        <div class="col p-3">    
                            <h3 class="mb-0"> <b>{{$value->title}}</b> 
                            <span class="h5 float-right">
                                <div class="dropdown dropleft float-right">
                                    <i class="fa fa-ellipsis-v" type="button" dropdown-toggle" data-toggle="dropdown"></i>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{URL::to('blog/'.$value->id . '/edit')}}">Edit</a>
                                        <a class="dropdown-item" href="{{URL::to('/del_blog/'.$value->id)}}">Delete</a>
                                    </div>
                                </div>
                            </span></h3>
                            <small class="text-muted">{{$value->created_at->format('d-M-Y, h:i A')}}</small>&nbsp;
                            @for($i=1;$i<=5;$i++)
                                @if($i <= $value->average)
                                    <i class="fa fa-star fill"></i>
                                @else
                                    <i class="fa fa-star"></i>
                                @endif
                            @endfor
                            <p style="font-size: 15px;margin:0.5rem 0"> {{$value->description}}</p>      
                            <a href="{{URL::to('/blog/'.$value->id)}}">
                                <img src="/image/{{$value->image}}" class="w-100 mb-2"> 
                            </a>
                            <hr>
                            <div class="d-flex border-bottom justify-content-between">
                                <p class="h5">Comments</p>
                                <a class="btn p-0" data-toggle="modal" data-target="#showcomment{{$value->id}}">
                                {{$review->where('blog_id',$value->id)->count()}} comments
                                </a>
                                <div class="modal fade" id="showcomment{{$value->id}}" tabindex="-1" aria-labelledby="commentlist" aria-hidden="true">
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
                            @foreach($value->comment as $comment)
                                @foreach($comment->user as $user)
                                    <div class="row mt-2 border-bottom">
                                        <div class="p-2 ml-3">
                                            <a href="{{URL::to('/user/detail/'.$user->id)}}">
                                                <img src="/image/{{$user->image}}" class="border rounded-circle" style="width:45px;height:45px;">
                                            </a>
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

