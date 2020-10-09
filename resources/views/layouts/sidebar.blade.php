@extends('layouts.nav')

@section('sidebar')
  <nav class="navbar flex-column p-0">          
      <ul class="navbar-nav w-100">
        <li class="nav-item py-3 d-flex">
          <img src="/image/{{Auth::user()->image}}" class="border rounded-circle ml-4" width="25px" height="25px">
          <a class="navbar-nav h5 pt-1 pl-1" href="{{URL::to('user/detail/'.Auth::user()->id)}}">{{Auth::user()->name}}</a>
        </li>
        <li class="nav-item py-1">
          <a class="nav-link h5 pl-4" href="{{Route('home')}}">Dashboard</a>
        </li>
        <li class="nav-item py-1">
          <a class="nav-link h5 pl-4" href="{{Route('category.index')}}">Category</a>
        </li>
        <li class="nav-item py-1">
          <a class="nav-link h5 pl-4" href="{{URL::to('user')}}">Author</a>
        </li>
        <li class="nav-item py-1">
          <a class="nav-link h5 pl-4" href="{{URL::to('blog')}}">Blog</a>
        </li>
      </ul>
  </nav>
@endsection