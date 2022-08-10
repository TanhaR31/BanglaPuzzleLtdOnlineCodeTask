<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //Blog Index
    public function index()
    {
        $blogs = DB::table('blogs')->get();
        return view('index')->with('blogs', $blogs);
    }
}