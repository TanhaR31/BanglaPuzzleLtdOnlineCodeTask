@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>MY BLOGS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />


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
    </style>
</head>

<body data-new-gr-c-s-check-loaded="14.1073.0" data-gr-ext-installed="">
    <!-- Page header with logo and tagline-->
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Welcome to Blog Home!</h1>
                <button type="submit" class="">
                    <a href="/blogCreate">Post Something →</a></button>
            </div>
        </div>
    </header>
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Nested row for non-featured blog posts-->
                @foreach($blogs as $blog)
                <div class="card mb-4">
                    <a href="#!"><img class="card-img-top" src="{{asset('images/'.$blog->image)}}" alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted">Blog-ID : {{$blog->id}}</div>
                        <h2 class="card-title h4">Title : {{$blog->title}}</h2>
                        <p class="card-text">{{$blog->description}}</p>
                        <button type="submit" class="">
                            <a href="/blogComment/{{$blog->id}}">Details →</a></button>
                        <button type="submit" class="">
                            <a href="/blogEdit/{{$blog->id}}/{{$blog->slug}}">Edit →</a></button>
                        <button type="submit" class="">
                            <a href="/blogDelete/{{$blog->id}}/{{$blog->slug}}">Delete →</a></button>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Author -->
                <div class="card mb-4">
                    <div class="card-header">Author</div>
                    <div class="card-body">
                        <div class="">
                            <img src="{{asset('images/'.$blogger->b_image)}}" style="width: 100%;" />
                            <strong>{{$blogger->b_name}}</strong>
                        </div>
                    </div>
                </div>
                <!-- Search widget-->
                <div class="card mb-4">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Enter search term..."
                                aria-label="Enter search term..." aria-describedby="button-search" />
                            <button class="btn btn-primary" id="button-search" type="button">
                                Go!
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Side widget-->
                <div class="card mb-4">
                    <div class="card-header">Side Widget</div>
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright © Your Website 2022</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>
@endsection