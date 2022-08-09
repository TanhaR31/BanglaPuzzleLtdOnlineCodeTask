<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Blog</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="m-4">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="Refresh:0" class="navbar-brand">Project</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">

                    @if(Session::has('seller'))
                    
                    @endif
                </div>
                @if(!Session::has('blogger'))
                    <div class="navbar-nav ms-auto">
                        <a href="{{route('login')}}" class="nav-item nav-link">Login</a>
                    </div>
                    @else
                    <div class="navbar-nav ms-auto">
                        <p></p>
                        <a href="" class="nav-item nav-link">{{Session::get('bloggername')}}</a>
                        <a href="{{route('logout')}}" class="btn btn-danger">Logout</a>
                    </div>
                    @endif
            </div>
        </div>
    </nav>
</div>
</body>
</html>