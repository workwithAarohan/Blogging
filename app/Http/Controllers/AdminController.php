<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Feedback;
use App\Category;
use App\User;
use App\Blog;
use View;
class AdminController extends Controller
{
    //
    public function author() 
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

        return View::make('admin.author',compact('user','blog_count'));
    }


    public function detail($id)
    {
        $user = User::find($id);
        $category = Category::all();
        $blog = Blog::where('user_id', $id)->orderBy('created_at','desc')->get();
        foreach($blog as $value)
        {
            $feedback = Feedback::where('blog_id',$value->id)->get();
            $average = round(Feedback::where('blog_id',$value->id)->avg('rating'));
            $value->feedback = $feedback;
            $value->average = $average;
            
            foreach($feedback as $feedbacks)
            {
                $users = User::where('id',$feedbacks->user_id)->get();
                $feedbacks->user = $users;
            }
                
        }
        $blog->count = Blog::where('user_id', $id)->count();
        $user->rating = Feedback::where('user_id',$id)->count();        
        $user->average = round(Feedback::where('user_id',$id)->avg('rating'));
        
        return View::make('admin.detail',compact('user', 'blog', 'category'));
    }

    public function blog()
    {
        $blog = Blog::where('user_id', Auth::user()->id)->get();
        return View::make('blog.index')->with('blog', $blog);
    }
}
