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
        /* margin: 8px 0; */
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
        margin: 12px 0 0 0;
    }

    img.avatar {
        width: 30%;
        height: 70%;
        border-radius: 50%;
    }

    .container {
        padding: 30px;
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

    <h3 style="text-align: center;">
        Blogger Id : @if(Session::get('blogger')) {{Session::get('blogger')}}@endif
    </h3>

    <form action="" method="">
        <!-- {{csrf_field()}} -->
        @csrf
        <div class="container">
            <div class="row ">
                <div class="imgcontainer">
                    <img src="{{asset('images/'.$blogger->b_image)}}" alt="Blogger Profile Picture" class="avatar">
                </div>
                <!-- <div class="form-group">
                    <img src="{{asset('images/'.$blogger->b_image)}}" alt="Blogger Profile Picture" width="500"
                        height="500">
                </div> -->

                <div class="form-group">
                    <input type="text" class="form-control rounded-left" name="b_name"
                        value="Name : {{$blogger->b_name}}" placeholder="Name" readonly>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control rounded-left" name="b_phone"
                        value="Phone Number : 0{{$blogger->b_phone}}" placeholder="Phone" readonly>
                </div>

                <div class="form-group">
                    <input type="email" class="form-control rounded-left" name="b_email"
                        value="Email Address : {{$blogger->b_email}}" placeholder="Email" readonly>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control rounded-left" name="b_address"
                        value="Address : {{$blogger->b_address}}" placeholder="Address" readonly>
                </div>
            </div>
        </div>
    </form>
</body>

</html>
@endsection