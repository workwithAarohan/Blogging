@extends('layouts.nav')

@section('sidebar')
  <nav class="navbar flex-column p-0">          
      <ul class="navbar-nav w-100">
        <li class="nav-item py-3">
          <a class="navbar-nav h4 pl-4" href="{{URL::to('user/detail/'.Auth::user()->id)}}">{{Auth::user()->name}}</a>
        </li>
        <li class="nav-item py-1">
          <a class="nav-link h5 pl-4" href="#">Dashboard</a>
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