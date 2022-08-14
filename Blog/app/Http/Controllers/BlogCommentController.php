<?php

namespace App\Http\Controllers;

use App\Models\BlogComment;
use App\Models\Blog;
use App\Http\Requests\StoreBlogCommentRequest;
use App\Http\Requests\UpdateBlogCommentRequest;
use App\Models\Blogger;
use Illuminate\Http\Request;


class BlogCommentController extends Controller
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
     * @param  \App\Http\Requests\StoreBlogCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogCommentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogComment  $blogComment
     * @return \Illuminate\Http\Response
     */
    public function show(BlogComment $blogComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogComment  $blogComment
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogComment $blogComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlogCommentRequest  $request
     * @param  \App\Models\BlogComment  $blogComment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogCommentRequest $request, BlogComment $blogComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogComment  $blogComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogComment $blogComment)
    {
        //
    }

    //Middleware
    public function __construct()
    {
        $this->middleware('validBlogger');
    }

    //Blog Comment
    public function blogComment(Request $request)
    {
        //return $request;
        $blog = Blog::where('id', $request->id)->first();
        $blogger = Blogger::where('id', $blog->blogger_id)->first();
        $oldBlogComments = BlogComment::where('blog_id', $request->id)->get();
        $id = session()->get('blogger');
        $me = Blogger::where('id', $id)->first();
        // return view('pages.blogDetails')->with('blog', $blog);
        return view('pages.blogDetails', compact('blog', 'blogger', 'me', 'oldBlogComments'));
        // return $me;
    }

    public function blogCommentSubmitted(Request $request)
    {
        // return $request;
        $blogComment = new BlogComment();
        $blogComment->blog_id = $request->blog_id;
        $blogComment->blogger_id = $request->blogger_id;
        $blogComment->commnt = $request->comment;
        $blogComment->save();

        return redirect()->back();
    }
}