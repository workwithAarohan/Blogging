@extends('layouts.app')

@section('title')
    Blog
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9">
                <h4>Create Blog</h4>

                <form action="{{URL::to('blog')}}" method="POST" enctype="mulipart/form-data">
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
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category">
                            <option value="1">Artificial Technologies</option>
                            <option value="2">Technologies</option>
                        </select>
                    </div>
                    <button class="btn btn-success" type="submit">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection