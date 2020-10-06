@extends('layouts.app')

@section('title')
    Blog
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9">
                <h4>Edit {{$blog->title}}</h4>

                <form action="" method="">
                @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <input type="text" class="form-control" id="content" name="content">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category">
                            <option value="{{$blog->cat_id}}">{{$blog->cat_id}}</option>
                        </select>
                    </div>
                    <button class="btn btn-success">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection