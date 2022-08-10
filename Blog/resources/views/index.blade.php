<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    margin: 0;
}

* {
    box-sizing: border-box;
}

img {
    vertical-align: middle;
}

/* Position the image container (needed to position the left and right arrows) */
.container {
    position: relative;
    padding: 5px;
}

/* Hide the images by default */
.mySlides {
    display: none;
}

.image {
    display: block;
    width: 100%;
    height: 700px;
}

.overlay {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    height: 100%;
    width: 100%;
    opacity: 0;
    transition: .5s ease;
    background-color: black;
}

.container:hover .overlay {
    opacity: 0.5;
}

.text {
    color: white;
    font-size: 20px;
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    text-align: center;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
    cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
    cursor: pointer;
    position: absolute;
    top: 40%;
    width: auto;
    padding: 16px;
    margin-top: -50px;
    color: white;
    font-weight: bold;
    font-size: 20px;
    border-radius: 0 3px 3px 0;
    user-select: none;
    -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
    right: 0;
    border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
    background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
    color: #f2f2f2;
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
}

/* Container for image text */
.caption-container {
    text-align: center;
    background-color: #222;
    padding: 2px 16px;
    color: white;
}

.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Six columns side by side */
.column {
    float: left;
    width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.demo {
    opacity: 0.6;
}

.active,
.demo:hover {
    opacity: 1;
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

a {
    text-decoration: none;
    color: white;
}

/* Full-width input fields */
input[type=text],
input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
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

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

/* .container {
    padding: 16px;
} */

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none;
    /* Hidden by default */
    position: fixed;
    /* Stay in place */
    z-index: 1;
    /* Sit on top */
    left: 0;
    top: 0;
    width: 100%;
    /* Full width */
    height: 100%;
    /* Full height */
    overflow: auto;
    /* Enable scroll if needed */
    background-color: rgb(0, 0, 0);
    /* Fallback color */
    background-color: rgba(0, 0, 0, 0.4);
    /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto;
    /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%;
    /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}



@-webkit-keyframes animatezoom {
    from {
        -webkit-transform: scale(0)
    }

    to {
        -webkit-transform: scale(1)
    }
}

@keyframes animatezoom {
    from {
        transform: scale(0)
    }

    to {
        transform: scale(1)
    }
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
        display: block;
        float: none;
    }

    .cancelbtn {
        width: 100%;
    }
}
</style>

<body>

    <!-- LOGIN MODAL START -->
    <h2 style="text-align:center">Bangla Puzzle Blogs</h2>
    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>

    <div id="id01" class="modal">

        <form class="modal-content animate" action="{{route('login')}}" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close"
                    title="Close Modal">&times;</span>
                <img src="{{asset('images/login-avatar.png')}}" alt="Avatar" class="avatar">
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
                    <label class="checkbox-primary btn btn-light rounded submit p-3 px-5">Remember Me
                        <input type="checkbox" name="remember">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <!-- Submit -->
                <button type="submit">Login</button>
                <!-- Registration -->
                <div class="form-group">
                    <button type="submit" class="btn btn-light rounded submit p-3">
                        <a href="{{route('registration')}}">Don't Have Account? Click here</a></button>
                </div>
            </div>

            <!-- <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'"
                    class="cancelbtn">Cancel</button>
            </div> -->
        </form>

    </div>

    <script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>
    <!-- LOGIN MODAL END -->

    <!-- SWIPER START -->
    <div class="container">
        @foreach($blogs as $blog)
        <div class="mySlides">
            <div class="numbertext"><span>{{$blog->title}}</span></div>
            <img src="{{asset('images/'.$blog->image)}}" class="image">
            <div class="overlay">
                <div class="text">{{$blog->description}}</div>
            </div>
        </div>
        @endforeach

        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>
    </div>

    <script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("demo");
        let captionText = document.getElementById("caption");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        captionText.innerHTML = dots[slideIndex - 1].alt;
    }
    </script>
    <!-- SWIPER END -->

    <!-- <button type="submit"><a href="{{route('login')}}">Click Here To Login</a>
    </button> -->
</body>
<!-- <table class="table table-bordered">
    <tr>
        <th>Id</th>
        <th>Blogger Id</th>
        <th>Title</th>
        <th>Slug</th>
        <th>Description</th>
        <th>Image</th>
    </tr>
    @foreach($blogs as $blog)
    <tr>
        <td><img src="{{asset('images/'.$blog->image)}}" alt="Blog Picture" width="45" height="40">
        </td>
        <td>{{$blog->id}}</td>
        <td>{{$blog->blogger_id}}</td>
        <td>{{$blog->title}}</td>
        <td>{{$blog->slug}}</td>
        <td>{{$blog->description}}</td>
        <td><a href="/blogEdit/{{$blog->id}}/{{$blog->slug}}" class="btn btn-info">Edit</a>
        </td>
        <td><a href="/blogDelete/{{$blog->id}}/{{$blog->slug}}" class="btn btn-Danger">Delete</a>
        </td>
    </tr>
    @endforeach
</table> -->

</html>
</section>