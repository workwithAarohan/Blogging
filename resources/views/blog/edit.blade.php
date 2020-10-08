@extends('layouts.app')

@section('title')
    Blog
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9">
                <h4>Edit {{$blog->title}}</h4>

                <form action="{{URL::to('/blog/'.$blog->id)}}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" value="{{$blog->title}}" name="title">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" id="content" name="content">{{$blog->content}} </textarea>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" value="{{$blog->description}}" name="description">
                    </div>
                    <div class="form-group">
                        <label for="image">image</label>
                        <input type="file" class="form-control" value="{{$blog->image}}" id="image" name="image">
                    </div>
                    <select name="cat_id">
                            @foreach($category as $value)
                                @if($blog->cat_id === $value->id)
                                <option value="{{$value->id}}" selected>{{$value->title}}</option>
                                @else
                                <option value="{{$value->id}}">{{$value->title}}</option>
                                @endif
                            @endforeach
                        </select>
                    <input type="hidden" value="{{$blog->user_id}}" name="user_id">
                    <button class="btn btn-success">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection