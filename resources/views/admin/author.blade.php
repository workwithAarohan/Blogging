@extends('layouts.sidebar')

@section('title')
    Users
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <b>Users</b>
                </div>

                <div class="card-body">
                    {{$user->count}}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <b>Total Blogs</b>
                </div>

                <div class="card-body">

                    {{$blog_count}}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" style="background-color: red;">
                <div class="card-header">
                    <b>Rating</b>
                </div>

                <div class="card-body">
                    {{$blog_count}}
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5 justify-content-center">
            <div class="col-md-10 pt-3 shadow bg-white rounded">
                <table class="table text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Blogs</th>
                            <th>Rating</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td><a href="{{URL::to('user/detail/'.$value->id)}}">{{$value->name}}</a></td>
                                <td>{{$value->email}}</td>
                                <td> {{$value->blog}} </td>
                                <td> {{$value->rating}} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</div>
@endsection
