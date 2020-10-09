@extends('layouts.sidebar')

@section('title')
    Users
@endsection

@section('content')
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col pt-3 shadow bg-white rounded">
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
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
