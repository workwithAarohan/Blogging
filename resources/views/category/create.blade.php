@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col col-md-5 border p-4">
                <h4>Add Category</h4><hr>
                <form action="{{URL::to('category')}}" method="POST" class="form-group">
                    @csrf 
                    <label for="">Title</label>
                    <div class="form-group">
                        <input type="text" name="title" class="form-control">
                    </div>
                    <button class="btn btn-primary" type="submit">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection