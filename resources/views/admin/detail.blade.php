@extends('layouts.sidebar')

@section('title')
    {{$user->name}}
@endsection

@section('content')
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col col-md-7 pt-3 shadow bg-white rounded">
                <p>Username : {{$user->name}}</p>
                <p>Email : {{$user->email}}</p>
                <p>Created at : {{$user->created_at}}</p>
            </div>
        </div>
    </div>
@endsection
