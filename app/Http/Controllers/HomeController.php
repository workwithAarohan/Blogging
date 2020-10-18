<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Feedback;
use App\Category;
use App\User;
use App\Blog;
use View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::all();
        $user->count = User::count();

        $blog_count = Blog::count();

        foreach($user as $value)
        {
            $blog = Blog::where('user_id',$value->id)->count();
            $value->blog = $blog;
            $average = round(Feedback::where('user_id',$value->id)->avg('rating'));
            $value->rating = $average;
        }

        return View::make('home',compact('user','blog_count'));
    }
}
