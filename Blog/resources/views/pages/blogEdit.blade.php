@extends('layouts.nonav')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    form {
        border: 3px solid #f1f1f1;
    }

    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    button {
        background-color: #04AA6D;
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

    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
    }

    img.avatar {
        width: 20%;
        border-radius: 50%;
    }

    .container {
        padding: 16px;
    }

    span.psw {
        float: right;
        padding-top: 16px;
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }
    }
    </style>
</head>

<body>

    <form action="{{route('blogEdit')}}" method="post" enctype="multipart/form-data">
        <!-- {{csrf_field()}} -->
        @csrf
        <div class="container">
            <div class="row ">
                <div class="form-group" style="text-align: center;">
                    <img src="{{asset('images/'.$blog->image)}}" alt="" width="500" height="500">
                </div>

                <div class="form-group">
                    <br>Blog ID<input type="number" class="form-control rounded-left" name="id" value="{{$blog->id}}"
                        placeholder="ID" readonly>
                </div>

                <div class="form-group">
                    <br>Blogger ID<input type="number" class="form-control rounded-left" name="blogger_id"
                        value="{{$blog->blogger_id}}" placeholder="Blogger ID" readonly>
                </div>

                <div class="form-group">
                    Blog Title : <input type="text" class="form-control rounded-left" name="title"
                        value="{{$blog->title}}" placeholder="Title" required>
                </div>

                <div class="form-group">
                    Blog Slug : <input type="text" class="form-control rounded-left" name="slug" value="{{$blog->slug}}"
                        placeholder="Slug" required>
                </div>

                <div class="form-group">
                    Blog Description : <input type="text" class="form-control rounded-left" name="description"
                        value="{{$blog->description}}" placeholder="Description" required>
                </div>

                <div class="form-group">
                    <input type="file" class="form-control" name="image" value="{{old('image')}}">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary rounded submit p-3 px-5">Edit
                        Blog</button>
                </div>
    </form>

</body>

</html>
@endsection