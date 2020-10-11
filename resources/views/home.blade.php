@extends('layouts.sidebar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <b>Blog</b>
                </div>

                <div class="card-body">
                    {{$blog}}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <b>No. of Rating</b>
                </div>

                <div class="card-body">

                    {{$rating}}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" style="background-color: red;">
                <div class="card-header">
                    <b>Rating</b>
                </div>

                <div class="card-body">
                    {{$average}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
