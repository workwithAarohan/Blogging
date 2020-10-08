<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Blog;
use View;
class AdminController extends Controller
{
    //
    public function author()
    {
        $user = User::all();
        return View::make('admin.author')->with('user', $user);
    }
    public function detail($id)
    {
        $user = User::find($id);
        return View::make('admin.detail')->with('user', $user);
    }
    public function blog()
    {
        $blog = Blog::where('user_id', Auth::user()->id)->get();
        return View::make('blog.index')->with('blog', $blog);
    }
}
