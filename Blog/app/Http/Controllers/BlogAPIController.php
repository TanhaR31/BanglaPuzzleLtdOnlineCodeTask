<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;


class BlogAPIController extends Controller
{
    public function allBlogList()
    {
        $blogs = DB::table('blogs')->get();
        return $blogs;
    }

    public function addBlog(Request $request)
    {
        $id = session()->get('blogger');
        $blog = new Blog();
        $blog->blogger_id = $request->blogger_id;
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->description = $request->description;
        $imageName = time() . "_" . $request->file('image')->getClientOriginalName();
        $request->image->move(public_path('images'), $imageName);
        $blog->image = $request->file('image')->store('blogs');
        $blog->image = "";
        $blog->save();
        return $blog;
    }

    public function getBlog(Request $request)
    {
        $blog = Blog::where('id', $request->id)->first();
        return $blog;
    }
    public function updateBlog(Request $request)
    {
        // $id = session()->get('seller');

        $blog = Blog::where('id', $request->id)->first();
        $blog->id = $request->id;
        $blog->blogger_id = $request->blogger_id;
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->description = $request->description;
        if ($request->hasFile('image')) {
            $imageName = time() . "_" . $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('images'), $imageName);
            $blog->image = $imageName;
            $blog->save();
        } else {

            $blog->p_image = $blog->p_image;
        }

        $blog->save();

        return $blog;
    }

    public function deleteBlog(Request $request)
    {
        Blog::where('id', $request->id)->delete();
        // return "Product Deleted";
    }
}