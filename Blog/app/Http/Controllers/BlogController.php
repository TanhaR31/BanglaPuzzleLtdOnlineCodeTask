<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogComment;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBlogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlogRequest  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }

    public function allBlog()
    {
        $id = session()->get('blogger');
        $blogs = Blog::where('blogger_id', $id)->get();
        return view('pages.allBlog')->with('blogs', $blogs);
    }

    public function blogDetails()
    {
        return view('pages.blogDetails');
    }

    //New Blog Post
    public function blogCreate()
    {
        return view('pages.blogCreate');
    }
    public function blogCreateSubmitted(Request $request)
    {
        // return $request;
        $blog = new Blog();
        $blog->blogger_id = $request->blogger_id;
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->description = $request->description;
        $imageName = time() . "_" . $request->file('image')->getClientOriginalName();
        $request->image->move(public_path('images'), $imageName);
        $blog->image = $imageName;
        $blog->save();

        return redirect(route('allBlog'));
    }

    //Blog Edit
    public function blogEdit(Request $request)
    {
        //return $request;
        $blog = Blog::where('id', $request->id)->first();
        return view('pages.blogEdit')->with('blog', $blog);
    }

    public function blogEditSubmitted(Request $request)
    {
        //return $request;
        $blog = Blog::where('id', $request->id)->first();
        $blog->id = $blog->id;
        $blog->blogger_id = $blog->blogger_id;
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->description = $request->description;


        if ($request->hasFile('image')) {
            $imageName = time() . "_" . $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('images'), $imageName);
            $blog->image = $imageName;
            $blog->save();
        } else {

            $blog->image = $blog->image;
        }
        $blog->save();

        return redirect(route('allBlog'));
    }

    // Blog Delete
    public function blogDelete(Request $request)
    {
        $blog = Blog::where('id', $request->id)->first();
        // $comment = BlogComment::where('blog_id', $blog->id)->get();
        // // return $comment;
        // $comment->delete();
        BlogComment::where('blog_id', $blog->id)->delete();
        $blog->delete();

        return redirect()->route('allBlog');
    }
}