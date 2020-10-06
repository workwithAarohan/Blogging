@extends('layouts.app')

@section('title')
    Edit
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col col-md-5 p-4 shadow bg-white rounded">
                <h4>Edit</h4><hr>

                <form action="{{URL::to('feedback/update/'.$feedback->id)}}" method="POST" class="form-group">
                    @csrf
                    <label for="">Comment</label>
                    <div class="form-group">
                        <input type="hidden" value="{{$feedback->blog_id}}" name="blog_id">
                        <input type="hidden" value="{{$feedback->user_id}}" name="user_id">
                        <input type="hidden" value="{{$feedback->rating}}" name="rating">
                        <input type="text" name="comment" value="{{$feedback->comment}}" class="form-control">
                    </div>
                    <button class="btn btn-primary" type="submit">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
