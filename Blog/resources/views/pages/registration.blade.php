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
    input[type=password],
    input[type=email] {
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

    a {
        text-decoration: none;
        color: white;
    }

    a:hover {
        text-decoration: none;
        color: white;
        opacity: 0.5;
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
    @if(!Session::has('blogger'))
    <h2 style="text-align: center;">Registration Form</h2>

    <form action="{{route('registration')}}" method="post" enctype="multipart/form-data">
        <!-- {{csrf_field()}} -->
        <div class="imgcontainer">
            <img src="{{asset('images/reg.png')}}" alt="Avatar" class="avatar">
        </div>
        @csrf
        @if(session()->has('exist'))
        <div class="alert alert-danger">
            {{ session()->get('exist') }}
        </div>
        @endif
        <div class="container">
            <div class="row ">
                <div class="form-group">
                    <br>New Blogger ID<input type="text" class="form-control rounded-left" name="id" value="{{$data}}"
                        placeholder="ID" readonly>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control rounded-left" name="b_name" value="{{old('b_name')}}"
                        placeholder="Name" required>
                </div>
                @error('b_name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <input type="text" class="form-control rounded-left" name="b_phone" value="{{old('b_phone')}}"
                        placeholder="Phone" required>
                </div>
                @error('b_phone')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <input type="email" class="form-control rounded-left" name="b_email" value="{{old('b_email')}}"
                        placeholder="Email">
                </div>
                @error('b_email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group d-flex">
                    <input type="password" class="form-control rounded-left" name="b_password" placeholder="Password"
                        required>
                </div>
                @error('b_password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group d-flex">
                    <input type="password" class="form-control rounded-left" name="b_password_confirm"
                        placeholder="Confirm Password" required>
                </div>
                @error('b_password_confirm')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <input type="text" class="form-control rounded-left" name="b_address" value="{{old('b_address')}}"
                        placeholder="Address" required>
                </div>
                @error('b_address')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <input type="file" class="form-control" name="b_image" value="{{old('b_image')}}">
                </div>
                @error('b_image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <button type="submit">Confirm
                        Registration</button>
                </div>
                <div class="form-group">
                    <button type="submit">
                        <a href=" {{route('login')}}">Already Registered? Click here</a></button>
                </div>
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