@extends('layouts.app')

@section('title')
    Category
@endsection


@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col col-md-7 mb-4">
                <a href="{{Route('category.create')}}" class="float-right text-muted text-decoration-none ">Add New Category</a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col col-md-7">
                <table class="table table-bordered text-center">
                    <thead >
                        <tr>
                            <th>id</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($category as $value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->title}}</td>
                                <td> 
                                    <a href="{{URL::to('/category/'.$value->id.'/edit')}}" class="btn btn-success">
                                        Edit
                                    </a> 
                                    <a href="{{URL::to('/del_category/'.$value->id)}}" class="btn btn-danger">
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
