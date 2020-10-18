@extends('layouts.sidebar')

@section('title')
    Users
@endsection

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-3 mb-2 mb-md-0">
            <div class="card">
                <div class="card-header bg-info">
                    <b>Users</b>
                </div>

                <div class="card-body">
                    {{$user->count}}
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-2 mb-md-0">
            <div class="card">
                <div class="card-header bg-success">
                    <b>Total Blogs</b>
                </div>

                <div class="card-body">

                    {{$blog_count}}
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-2 mb-md-0">
            <div class="card">
                <div class="card-header bg-secondary">
                    <b>Rating</b>
                </div>

                <div class="card-body">
                    {{$blog_count}}
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5 justify-content-center">
            <div class="col-sm-11 col-md-9 pt-3 shadow bg-white rounded">
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
                                <td>  @for($i=1;$i<=5;$i++)
                                        @if($i <= $value->rating)
                                            <i class="fa fa-star fill"></i>
                                        @else
                                            <i class="fa fa-star"></i>
                                        @endif
                                    @endfor 
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</div>
@endsection
