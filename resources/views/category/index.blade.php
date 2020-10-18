@extends('layouts.sidebar')

@section('title')
    Category
@endsection


@section('content')
    <div class="container mt-5">
        <div class="row justify-content-end ml-3">
            <div class="col col-md-8 mb-4">
                <button type="button" class="btn btn-outline-info rounded" data-toggle="modal" data-target="#createcat">
                Add New Category
                </button>

                <div class="modal fade" id="createcat" tabindex="-1" aria-labelledby="addcategory" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form action="{{URL::to('category')}}" method="POST" class="form-group">
                                @csrf 
                                <label for="">Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" type="submit">Add</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <span class="badge badge-primary" style="padding-top: 12px; text-align:center; width: 7rem; height: 3rem; font-size: 2rem; ">
                    {{$category->count}}
                </span>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col col-md-9 pt-3 shadow bg-white rounded">
                <table class="table text-center">
                    <thead >
                        <tr>
                            <th>Id</th>
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
    </div>
@endsection
