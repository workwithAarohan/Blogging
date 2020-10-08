@extends('layouts.sidebar')

@section('title')
    Users
@endsection

@section('content')
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col col-md-7 pt-3 shadow bg-white rounded">
                <table class="table text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>id</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td><a href="{{URL::to('user/detail/'.$value->id)}}">{{$value->name}}</a></td>
                                <td>{{$value->email}}</td>
                                <td> 
                                    <a href="{{URL::to('/del_user/'.$value->id)}}" class="btn btn-danger">
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
