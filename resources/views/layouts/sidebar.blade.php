@extends('layouts.nav')

@section('sidebar')
  <div class="sidebar">
    <nav class="navbar flex-column p-0">          
      <ul class="navbar-nav w-100">
        <li class="nav-item py-3">
          <a class="navbar-nav h5 pt-1 pl-4" href="{{URL::to('user/detail/'.Auth::user()->id)}}">Dashboard</a>
        </li>
        <li class="nav-item py-1">
          <a class="nav-link h5 pl-4" href="{{Route('home')}}">Admin Dashboard</a>
        </li>
        <li class="nav-item py-1">
          <a class="nav-link h5 pl-4" href="{{Route('category.index')}}">Category</a>
        </li>
        <li class="nav-item py-1">
          <a class="nav-link h5 pl-4" href="{{URL::to('user')}}">Author</a>
        </li>
        <li class="nav-item py-1">
          <a class="nav-link h5 pl-4" href="{{URL::to('blog')}}">Explore</a>
        </li>
      </ul>
    </nav>
  </div>
@endsection