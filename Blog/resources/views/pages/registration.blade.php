@extends('layouts.app')
@section('content')
<section class="ftco-section">
<div class="container">
<div class="row justify-content-center">
	<div class="col-md-6 text-center mb-5">		
		
    <form action="{{route('registration')}}" method="post"  enctype="multipart/form-data">
        <!-- {{csrf_field()}} -->
        @csrf
        @if(session()->has('exist'))
            <div class="alert alert-danger">
                {{ session()->get('exist') }}
            </div>
        @endif
        <div class="container">
            <div class="row ">
                <div class="form-group">
                <br>Blogger ID<input type="text" class="form-control rounded-left" name="id" value="{{$data}}" placeholder="ID" readonly>
                </div>
                
                <div class="form-group">
                <input type="text" class="form-control rounded-left" name="b_name" value="{{old('b_name')}}" placeholder="Name" required>
                </div>
                @error('b_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                <input type="text" class="form-control rounded-left" name="b_phone" value="{{old('b_phone')}}" placeholder="Phone" required>
                </div>
                @error('b_phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                <input type="email" class="form-control rounded-left" name="b_email" value="{{old('b_email')}}" placeholder="Email">
                </div>
                @error('b_email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group d-flex">
                    <input type="password" class="form-control rounded-left" name="b_password" placeholder="Password" required>
                </div>
                @error('b_password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group d-flex">
                    <input type="password" class="form-control rounded-left" name="b_password_confirm" placeholder="Confirm Password" required>
                </div>
                @error('b_password_confirm')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                
                <div class="form-group">
                <input type="text" class="form-control rounded-left" name="b_address" value="{{old('b_address')}}" placeholder="Address" required>
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
                    <button type="submit" class="btn btn-primary rounded submit p-3 px-5">Confirm Registration</button>
                </div>
            </form>
        </div>
    </div>
</div>
</section>
@endsection

