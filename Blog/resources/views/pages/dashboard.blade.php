@extends('layouts.app')
@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <br>
                <h3>
                    Blogger Id : @if(Session::get('blogger')) {{Session::get('blogger')}}@endif
                </h3>

                <form action="" method="">
                    <!-- {{csrf_field()}} -->
                    @csrf
                    <div class="container">
                        <div class="row ">
                            <div class="form-group">
                                <img src="{{asset('images/'.$blogger->b_image)}}" alt="Blogger Profile Picture"
                                    width="500" height="500">
                            </div>

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
            </div>
        </div>
    </div>
</section>
@endsection