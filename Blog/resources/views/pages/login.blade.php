@extends('layouts.app')
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

    a:hover {
        text-decoration: none;
        color: white;
        opacity: 0.5;
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
    @if(!Session::has('blogger'))
    <h2 style="text-align: center;">Login Form</h2>

    <form action="{{route('login')}}" method="post" class="login-form">

        <div class="imgcontainer">
            <img src="{{asset('images/log.png')}}" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            {{@csrf_field()}}
            @if(session()->has('message'))
            <div class="alert alert-danger">
                {{ session()->get('message') }}
            </div>
            @endif
            <!-- Email -->
            <label for="email"><b>Email Address</b></label>
            <input type="text" name="email" placeholder="Enter Email Address" <?php if (isset($_COOKIE['remember'])) {
                                                                                    echo $_COOKIE['remember'];
                                                                                } ?> value="<?php if (isset($_COOKIE['remember'])) {
                                                                                                echo $_COOKIE['remember'];
                                                                                            } ?>" required>
            <!-- Password -->
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Your Password" name="password" required>
            <!-- CheckBox -->
            <div class="form-group">
                <label class="checkbox-primary">Remember Me
                    <input type="checkbox" name="remember">
                    <span class="checkmark"></span>
                </label>
            </div>
            <!-- Submit -->
            <button type="submit">Login</button>
            <!-- Registration -->
            <div class="">
                <button type="submit" class="">
                    <a href="{{route('registration')}}">Don't Have Account? Click here</a></button>
            </div>
        </div>
    </form>
    @else
    <script>
    window.location = "/dashboard";
    </script>
    @endif
</body>

</html>
@endsection