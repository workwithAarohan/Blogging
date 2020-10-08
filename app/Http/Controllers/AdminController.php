<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Blog;
use App\Feedback;
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
        $blog = Blog::where('user_id', $id)->get();
        foreach($blog as $value)
        {
            $feedback = Feedback::where('blog_id',$value->id)->get();
            $value->feedback = $feedback;
            
            foreach($feedback as $feedbacks)
            {
                $users = User::where('id',$feedbacks->user_id)->get();
                $feedbacks->user = $users;
            }
            
            
        }
        

        return View::make('admin.detail',compact('user', 'blog'));
    }

    public function blog()
    {
        $blog = Blog::where('user_id', Auth::user()->id)->get();
        return View::make('blog.index')->with('blog', $blog);
    }
}
