<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Auth;
use App\Blog;
use App\User;
use App\Feedback;
use DB;
use View;
use Redirect;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $recentBlog = Blog::all()->sortByDesc('created_at');
        
        foreach($recentBlog as $value)
        {
            $category = Category::where('id',$value->cat_id)->get();
            $value->category = $category;

            $average = round(Feedback::where('blog_id',$value->id)->avg('rating'));
            $value->average = $average;
        }
        $recent = $recentBlog->take(3);
        
        $blog_topRated = $recentBlog->sortByDesc('average')->take(3);

        return View::make('blog.index',compact('recent','blog_topRated'));
    }

    public function blogCategoryWise($id)
    {
        $blog = Blog::where('cat_id', $id)->get();
        $category = Category::find($id);
        $blog->catTitle = $category->title;   //Select title from categories where id = $id;

        foreach($blog as $value)
        {
            $average = round(Feedback::where('blog_id',$value->id)->avg('rating'));
            $value->average = $average;
        }
       
        return View::make('blog.catwiseIndex',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = Category::all();                //Select * from categories;
        return View::make('blog.create')->with('category',$category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $blog = new blog();
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        $blog->description = $request->input('description');
        $blog->cat_id = $request->input('cat_id');
        $blog->user_id = $request->input('user_id');

        if($request->hasFile('image'))
        {
            $image=$request->file('image');
            $filename = $image->getClientOriginalName();
            $Path = public_path() . '/image/';
            $image->move($Path, $filename);
            $blog->image=$filename;
        }

        $blog->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $blog = Blog::find($id);
        $feedback = Feedback::where('blog_id',$id)->get(); // SELECT * FROM feedback where blog_id=$id;
        
        foreach($feedback as $value)
        {
            $user = User::where('id', $value->user_id)->get();
            $value->user = $user;
        }
        return View::make('blog.show',compact('blog', 'feedback'));
    }

    public function storeFeedback(Request $request)
    {
        $feedback = new Feedback();
        $feedback->comment = $request->input('comment');
        $feedback->blog_id = $request->input('blog_id');
        $feedback->user_id = $request->input('user_id');
        $feedback->rating = $request->input('rating');

        $feedback->save();
        return Redirect::to('blog/'.$feedback->blog_id);
    }

    public function editFeedback($id)
    {
        //
        $feedback = Feedback::find($id);
        return View::make('blog/editFeedback')->with('feedback', $feedback);
    }

    public function updateFeedback(Request $request, $id)
    {
        $feedback = Feedback::find($id);
        $feedback->comment = $request->input('comment');
        $feedback->blog_id = $request->input('blog_id');
        $feedback->user_id = $request->input('user_id');
        $feedback->rating = $request->input('rating');

        $feedback->save();
        return Redirect::to('blog/'.$feedback->blog_id);
    }

    public function destroyFeedback($id){
        $feedback = Feedback::find($id);
        $feedback->delete();

        return Redirect::to('blog/'.$feedback->blog_id);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $blog = Blog::find($id);
        $category = Category::all();
        return View::make('blog.edit', compact('blog', 'category'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $blog = Blog::find($id);
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        $blog->description = $request->input('description');
        $blog->cat_id = $request->input('cat_id');
        $blog->user_id = $request->input('user_id');

        if($request->hasFile('image'))
        {
            $image=$request->file('image');
            $filename = $image->getClientOriginalName();
            $Path = public_path() . '/image/';
            $image->move($Path, $filename);
            $blog->image=$filename;
        }

        $blog->save();
        return Redirect::to('blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $blog = Blog::find($id);
        $blog->delete();

        return redirect()->back();
    }
}
