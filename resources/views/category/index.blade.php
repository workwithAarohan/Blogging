@extends('layouts.app')

@section('title')
    Category
@endsection


@section('content')
    @foreach($category as $value)
        {{$value->title}} <br>
    @endforeach
@endsection

<?PHP
    foreach($category as $value)
    {

    }
?>
