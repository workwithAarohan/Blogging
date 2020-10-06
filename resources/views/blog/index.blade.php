@extends('layouts.app')

@section('title')
    Blog
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
        <div class="col">
        <table class="table table-striped text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>id</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($blog as $value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->title}}</td>
                                <td>{{$value->content}}</td>
                                <td>{{$value->description}}</td>
                                <td>{{$value->category}}</td>
                                <td><img src="{{$value->image}}" class="img-fluid"></td>
                                <td>{{$value->created_at}}</td>
                                <td class="d-flex"> 
                                    <a href="{{URL::to('/blog/'.$value->id.'/edit')}}" class="btn btn-success mr-1">
                                        Edit
                                    </a> 
                                    <a href="{{URL::to('/del_blog/'.$value->id)}}" class="btn btn-danger">
                                        Delete
                                    </a> 
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
        </div>
    </div>
@endsection
