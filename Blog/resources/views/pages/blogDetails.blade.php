@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>blog detail page - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Link external CSS  -->
    <!-- <link rel="stylesheet" href="blog-details.css" /> -->
    <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    button {
        background-color: darkorchid;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    button:hover {
        opacity: 0.8;
    }

    a {
        text-decoration: none;
        color: white;
    }

    a:hover {
        text-decoration: none;
        color: black;
    }

    .content-item {
        padding: 30px 0;
        background-color: #ffffff;
    }

    .content-item.grey {
        background-color: #f0f0f0;
        padding: 50px 0;
        height: 100%;
    }

    .content-item h2 {
        font-weight: 700;
        font-size: 35px;
        line-height: 45px;
        text-transform: uppercase;
        margin: 20px 0;
    }

    .content-item h3 {
        font-weight: 400;
        font-size: 20px;
        color: #555555;
        margin: 10px 0 15px;
        padding: 0;
    }

    .content-headline {
        height: 1px;
        text-align: center;
        margin: 20px 0 70px;
    }

    .content-headline h2 {
        background-color: #ffffff;
        display: inline-block;
        margin: -20px auto 0;
        padding: 0 20px;
    }

    .grey .content-headline h2 {
        background-color: #f0f0f0;
    }

    .content-headline h3 {
        font-size: 14px;
        color: #aaaaaa;
        display: block;
    }

    #comments {
        box-shadow: 0 -1px 6px 1px rgba(0, 0, 0, 0.1);
        background-color: #ffffff;
    }

    #comments form {
        margin-bottom: 30px;
    }

    #comments .btn {
        margin-top: 7px;
    }

    #comments form fieldset {
        clear: both;
    }

    #comments form textarea {
        height: 100px;
    }

    #comments .media {
        border-top: 1px dashed #dddddd;
        padding: 20px 0;
        margin: 0;
    }

    #comments .media>.pull-left {
        margin-right: 20px;
    }

    #comments .media img {
        max-width: 100px;
    }

    #comments .media h4 {
        margin: 0 0 10px;
    }

    #comments .media h4 span {
        font-size: 14px;
        float: right;
        color: #999999;
    }

    #comments .media p {
        margin-bottom: 15px;
        text-align: justify;
    }

    #comments .media-detail {
        margin: 0;
    }

    #comments .media-detail li {
        color: #aaaaaa;
        font-size: 12px;
        padding-right: 10px;
        font-weight: 600;
    }

    #comments .media-detail a:hover {
        text-decoration: underline;
    }

    #comments .media-detail li:last-child {
        padding-right: 0;
    }

    #comments .media-detail li i {
        color: #666666;
        font-size: 15px;
        margin-right: 10px;
    }
    </style>
</head>
<header class="py-5 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">Welcome to Blog Home!</h1>
            <p class="lead mb-0">
                Comment Anything
            </p>
        </div>
    </div>
</header>

<body>
    <div class="blog-single gray-bg">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-lg-8 m-15px-tb">
                    <article class="article">
                        <div class="article-img">
                            <img src="{{asset('images/'.$blog->image)}}" title="" alt="" />
                        </div>
                        <div class="article-title">
                            <h6>Blog ID : {{$blog->id}}</h6>
                            <h2>Blog Title : {{$blog->title}}</h2>
                            <div class="media">
                                <div class="avatar">
                                    <img src="{{asset('images/'.$blogger->b_image)}}" title="" alt="" />
                                </div>
                                <div class="media-body">
                                    <label>{{$blogger->b_name}}</label>
                                    <span>10 AUG 2022</span>
                                </div>
                            </div>
                        </div>
                        <div class="article-content">
                            <p>{{$blog->description}}</p>
                        </div>
                        <div class="nav tag-cloud">
                            <a href="#">Design</a>
                            <a href="#">Development</a>
                            <a href="#">Travel</a>
                            <a href="#">Web Design</a>
                            <a href="#">Marketing</a>
                            <a href="#">Research</a>
                            <a href="#">Managment</a>
                        </div>
                    </article>
                    <div class="contact-form article-comment">
                        <section class="content-item" id="comments">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <form action="{{route('blogComment')}}" method="post">
                                            @csrf
                                            <!-- {{ csrf_field() }} -->
                                            <h3 class="pull-left">New Comment By {{ session()->get('bloggername') }}
                                            </h3>

                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-sm-3 col-lg-2 hidden-xs">
                                                        <img class="img-responsive"
                                                            src="{{asset('images/'.$me->b_image)}}"
                                                            alt="{{$me->b_name}}" />
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="number" class="form-control rounded-left"
                                                            name="blog_id" value="{{$blog->id}}" placeholder="Blog ID"
                                                            hidden>
                                                    </div>

                                                    <div class="form-group">
                                                        <input type="number" class="form-control rounded-left"
                                                            name="blogger_id" value="{{ session()->get('blogger') }}"
                                                            placeholder="Blogger ID" hidden>
                                                    </div>
                                                    <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                                                        <textarea class="form-control" id="comment" name="comment"
                                                            placeholder="Your Comment" required></textarea>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <button type="submit" class="" style="float: right">
                                                Comment
                                            </button>
                                        </form>

                                        <h3>Previous Comments</h3>

                                        <!-- COMMENT 1 - START -->
                                        @foreach($oldBlogComments as $old)
                                        <div class="media">
                                            <a class="pull-left" href="#"><img class="media-object"
                                                    src="{{asset('images/log.png')}}" alt="" /></a>
                                            <div class="media-body">
                                                <h4 class="media-heading">Blogger ID : {{$old->blogger_id}}</h4>
                                                <p>{{$old->commnt}}</p>
                                                <ul class="list-unstyled list-inline media-detail pull-left">
                                                    <li><i class="fa fa-calendar"></i>10/08/2022</li>
                                                </ul>
                                            </div>
                                        </div>
                                        @endforeach
                                        <!-- COMMENT 1 - END -->
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="col-lg-4 m-15px-tb blog-aside">
                    <!-- Author -->
                    <div class="widget widget-author">
                        <div class="widget-title">
                            <h3>Author</h3>
                        </div>
                        <div class="widget-body">
                            <div class="media align-items-center">
                                <div class="avatar">
                                    <img src="{{asset('images/'.$blogger->b_image)}}" title="" alt="" />
                                </div>
                                <div class="media-body">
                                    <h6>
                                        Hello, I'm<br />
                                        {{$blogger->b_name}}
                                    </h6>
                                </div>
                            </div>
                            <p>
                                I design and develop services for customers of all sizes,
                                specializing in creating stylish, modern websites, web
                                services and online stores
                            </p>
                        </div>
                    </div>
                    <!-- End Author -->
                    <!-- Trending Post -->
                    <div class="widget widget-post">
                        <div class="widget-title">
                            <h3>Trending Now</h3>
                        </div>
                        <div class="widget-body"></div>
                    </div>
                    <!-- End Trending Post -->
                    <!-- Latest Post -->
                    <div class="widget widget-latest-post">
                        <div class="widget-title">
                            <h3>Latest Post</h3>
                        </div>
                        <div class="widget-body">
                            <div class="latest-post-aside media">
                                <div class="lpa-left media-body">
                                    <div class="lpa-title">
                                        <h5>
                                            <a href="#">Prevent 75% of visitors from google analytics</a>
                                        </h5>
                                    </div>
                                    <div class="lpa-meta">
                                        <a class="name" href="#"> Rachel Roth </a>
                                        <a class="date" href="#"> 26 FEB 2020 </a>
                                    </div>
                                </div>
                                <div class="lpa-right">
                                    <a href="#">
                                        <img src="https://via.placeholder.com/400x200/FFB6C1/000000" title="" alt="" />
                                    </a>
                                </div>
                            </div>
                            <div class="latest-post-aside media">
                                <div class="lpa-left media-body">
                                    <div class="lpa-title">
                                        <h5>
                                            <a href="#">Prevent 75% of visitors from google analytics</a>
                                        </h5>
                                    </div>
                                    <div class="lpa-meta">
                                        <a class="name" href="#"> Rachel Roth </a>
                                        <a class="date" href="#"> 26 FEB 2020 </a>
                                    </div>
                                </div>
                                <div class="lpa-right">
                                    <a href="#">
                                        <img src="https://via.placeholder.com/400x200/FFB6C1/000000" title="" alt="" />
                                    </a>
                                </div>
                            </div>
                            <div class="latest-post-aside media">
                                <div class="lpa-left media-body">
                                    <div class="lpa-title">
                                        <h5>
                                            <a href="#">Prevent 75% of visitors from google analytics</a>
                                        </h5>
                                    </div>
                                    <div class="lpa-meta">
                                        <a class="name" href="#"> Rachel Roth </a>
                                        <a class="date" href="#"> 26 FEB 2020 </a>
                                    </div>
                                </div>
                                <div class="lpa-right">
                                    <a href="#">
                                        <img src="https://via.placeholder.com/400x200/FFB6C1/000000" title="" alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Latest Post -->
                    <!-- widget Tags -->
                    <div class="widget widget-tags">
                        <div class="widget-title">
                            <h3>Latest Tags</h3>
                        </div>
                        <div class="widget-body">
                            <div class="nav tag-cloud">
                                <a href="#">Design</a>
                                <a href="#">Development</a>
                                <a href="#">Travel</a>
                                <a href="#">Web Design</a>
                                <a href="#">Marketing</a>
                                <a href="#">Research</a>
                                <a href="#">Managment</a>
                            </div>
                        </div>
                    </div>
                    <!-- End widget Tags -->
                </div>
            </div>
        </div>
    </div>

    <style type="text/css">
    body {
        margin-top: 20px;
    }

    .blog-listing {
        padding-top: 30px;
        padding-bottom: 30px;
    }


    .gray-bg {
        background-color: #f5f5f5;
    }

    /* Blog 
---------------------*/
    .blog-grid {
        box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
        border-radius: 5px;
        overflow: hidden;
        background: #ffffff;
        margin-top: 15px;
        margin-bottom: 15px;
    }

    .blog-grid .blog-img {
        position: relative;
    }

    .blog-grid .blog-img .date {
        position: absolute;
        background: #fc5356;
        color: #ffffff;
        padding: 8px 15px;
        left: 10px;
        top: 10px;
        border-radius: 4px;
    }

    .blog-grid .blog-img .date span {
        font-size: 22px;
        display: block;
        line-height: 22px;
        font-weight: 700;
    }

    .blog-grid .blog-img .date label {
        font-size: 14px;
        margin: 0;
    }

    .blog-grid .blog-info {
        padding: 20px;
    }

    .blog-grid .blog-info h5 {
        font-size: 22px;
        font-weight: 700;
        margin: 0 0 10px;
    }

    .blog-grid .blog-info h5 a {
        color: #20247b;
    }

    .blog-grid .blog-info p {
        margin: 0;
    }

    .blog-grid .blog-info .btn-bar {
        margin-top: 20px;
    }

    /* Blog Sidebar
-------------------*/
    .blog-aside .widget {
        box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
        border-radius: 5px;
        overflow: hidden;
        background: #ffffff;
        margin-top: 15px;
        margin-bottom: 15px;
        width: 100%;
        display: inline-block;
        vertical-align: top;
    }

    .blog-aside .widget-body {
        padding: 15px;
    }

    .blog-aside .widget-title {
        padding: 15px;
        border-bottom: 1px solid #eee;
    }

    .blog-aside .widget-title h3 {
        font-size: 20px;
        font-weight: 700;
        color: #fc5356;
        margin: 0;
    }

    .blog-aside .widget-author .media {
        margin-bottom: 15px;
    }

    .blog-aside .widget-author p {
        font-size: 16px;
        margin: 0;
    }

    .blog-aside .widget-author .avatar {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        overflow: hidden;
    }

    .blog-aside .widget-author h6 {
        font-weight: 600;
        color: #20247b;
        font-size: 22px;
        margin: 0;
        padding-left: 20px;
    }

    .blog-aside .post-aside {
        margin-bottom: 15px;
    }

    .blog-aside .post-aside .post-aside-title h5 {
        margin: 0;
    }

    .blog-aside .post-aside .post-aside-title a {
        font-size: 18px;
        color: #20247b;
        font-weight: 600;
    }

    .blog-aside .post-aside .post-aside-meta {
        padding-bottom: 10px;
    }

    .blog-aside .post-aside .post-aside-meta a {
        color: #6f8ba4;
        font-size: 12px;
        text-transform: uppercase;
        display: inline-block;
        margin-right: 10px;
    }

    .blog-aside .latest-post-aside+.latest-post-aside {
        border-top: 1px solid #eee;
        padding-top: 15px;
        margin-top: 15px;
    }

    .blog-aside .latest-post-aside .lpa-right {
        width: 90px;
    }

    .blog-aside .latest-post-aside .lpa-right img {
        border-radius: 3px;
    }

    .blog-aside .latest-post-aside .lpa-left {
        padding-right: 15px;
    }

    .blog-aside .latest-post-aside .lpa-title h5 {
        margin: 0;
        font-size: 15px;
    }

    .blog-aside .latest-post-aside .lpa-title a {
        color: #20247b;
        font-weight: 600;
    }

    .blog-aside .latest-post-aside .lpa-meta a {
        color: #6f8ba4;
        font-size: 12px;
        text-transform: uppercase;
        display: inline-block;
        margin-right: 10px;
    }

    .tag-cloud a {
        padding: 4px 15px;
        font-size: 13px;
        color: #ffffff;
        background: #20247b;
        border-radius: 3px;
        margin-right: 4px;
        margin-bottom: 4px;
    }

    .tag-cloud a:hover {
        background: #fc5356;
    }

    .blog-single {
        padding-top: 30px;
        padding-bottom: 30px;
    }

    .article {
        box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
        border-radius: 5px;
        overflow: hidden;
        background: #ffffff;
        padding: 15px;
        margin: 15px 0 30px;
    }

    .article .article-title {
        padding: 15px 0 20px;
    }

    .article .article-title h6 {
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .article .article-title h6 a {
        text-transform: uppercase;
        color: #fc5356;
        border-bottom: 1px solid #fc5356;
    }

    .article .article-title h2 {
        color: #20247b;
        font-weight: 600;
    }

    .article .article-title .media {
        padding-top: 15px;
        border-bottom: 1px dashed #ddd;
        padding-bottom: 20px;
    }

    .article .article-title .media .avatar {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        overflow: hidden;
    }

    .article .article-title .media .media-body {
        padding-left: 8px;
    }

    .article .article-title .media .media-body label {
        font-weight: 600;
        color: #fc5356;
        margin: 0;
    }

    .article .article-title .media .media-body span {
        display: block;
        font-size: 12px;
    }

    .article .article-content h1,
    .article .article-content h2,
    .article .article-content h3,
    .article .article-content h4,
    .article .article-content h5,
    .article .article-content h6 {
        color: #20247b;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .article .article-content blockquote {
        max-width: 600px;
        padding: 15px 0 30px 0;
        margin: 0;
    }

    .article .article-content blockquote p {
        font-size: 20px;
        font-weight: 500;
        color: #fc5356;
        margin: 0;
    }

    .article .article-content blockquote .blockquote-footer {
        color: #20247b;
        font-size: 16px;
    }

    .article .article-content blockquote .blockquote-footer cite {
        font-weight: 600;
    }

    .article .tag-cloud {
        padding-top: 10px;
    }

    .article-comment {
        box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
        border-radius: 5px;
        overflow: hidden;
        background: #ffffff;
        padding: 20px;
    }

    .article-comment h4 {
        color: #20247b;
        font-weight: 700;
        margin-bottom: 25px;
        font-size: 22px;
    }

    img {
        max-width: 100%;
    }

    img {
        vertical-align: middle;
        border-style: none;
    }

    /* Contact Us
---------------------*/
    .contact-name {
        margin-bottom: 30px;
    }

    .contact-name h5 {
        font-size: 22px;
        color: #20247b;
        margin-bottom: 5px;
        font-weight: 600;
    }

    .contact-name p {
        font-size: 18px;
        margin: 0;
    }

    .social-share a {
        width: 40px;
        height: 40px;
        line-height: 40px;
        border-radius: 50%;
        color: #ffffff;
        text-align: center;
        margin-right: 10px;
    }

    .social-share .dribbble {
        box-shadow: 0 8px 30px -4px rgba(234, 76, 137, 0.5);
        background-color: #ea4c89;
    }

    .social-share .behance {
        box-shadow: 0 8px 30px -4px rgba(0, 103, 255, 0.5);
        background-color: #0067ff;
    }

    .social-share .linkedin {
        box-shadow: 0 8px 30px -4px rgba(1, 119, 172, 0.5);
        background-color: #0177ac;
    }

    .contact-form .form-control {
        border: none;
        border-bottom: 1px solid #20247b;
        background: transparent;
        border-radius: 0;
        padding-left: 0;
        box-shadow: none !important;
    }

    .contact-form .form-control:focus {
        border-bottom: 1px solid #fc5356;
    }

    .contact-form .form-control.invalid {
        border-bottom: 1px solid #ff0000;
    }

    .contact-form .send {
        margin-top: 20px;
    }

    @media (max-width: 767px) {
        .contact-form .send {
            margin-bottom: 20px;
        }
    }

    .section-title h2 {
        font-weight: 700;
        color: #20247b;
        font-size: 45px;
        margin: 0 0 15px;
        border-left: 5px solid #fc5356;
        padding-left: 15px;
    }

    .section-title {
        padding-bottom: 45px;
    }

    .contact-form .send {
        margin-top: 20px;
    }

    .px-btn {
        padding: 0 50px 0 20px;
        line-height: 60px;
        position: relative;
        display: inline-block;
        color: #20247b;
        background: none;
        border: none;
    }

    .px-btn:before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        display: block;
        border-radius: 30px;
        background: transparent;
        border: 1px solid rgba(252, 83, 86, 0.6);
        border-right: 1px solid transparent;
        -moz-transition: ease all 0.35s;
        -o-transition: ease all 0.35s;
        -webkit-transition: ease all 0.35s;
        transition: ease all 0.35s;
        width: 60px;
        height: 60px;
    }

    .px-btn .arrow {
        width: 13px;
        height: 2px;
        background: currentColor;
        display: inline-block;
        position: absolute;
        top: 0;
        bottom: 0;
        margin: auto;
        right: 25px;
    }

    .px-btn .arrow:after {
        width: 8px;
        height: 8px;
        border-right: 2px solid currentColor;
        border-top: 2px solid currentColor;
        content: "";
        position: absolute;
        top: -3px;
        right: 0;
        display: inline-block;
        -moz-transform: rotate(45deg);
        -o-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
    }
    </style>

    <script type="text/javascript"></script>
</body>

</html>
@endsection