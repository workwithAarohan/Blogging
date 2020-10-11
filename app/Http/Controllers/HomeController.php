<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Feedback;
use Auth;

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
        $blog = Blog::where('user_id',Auth::user()->id)->count();
        $rating = Feedback::where('user_id',Auth::user()->id)->count();
        
        $average = round(Feedback::where('user_id',Auth::user()->id)->avg('rating'));

        return view('home',compact('blog','rating','average'));
    }
}
