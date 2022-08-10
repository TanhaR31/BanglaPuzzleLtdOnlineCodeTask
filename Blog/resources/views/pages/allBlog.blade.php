<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    font-family: Arial;
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
</style>

<body>

    <h2 style="text-align:center">Bangla Puzzle Blogs</h2>

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

</body>

</html>
</section>
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
    @endforeach -->
<!-- </table> -->