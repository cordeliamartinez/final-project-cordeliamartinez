<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title") - Final Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <link href="/css/main.css" rel="stylesheet">
</head>
<body>
    <div class="row">
        <nav class="navbar navbar-expand-lg bg-black">
            <div class="container-fluid">
                <a class="navbar-brand p-2" href="{{route('homepage.index')}}">myBikeRoute.com</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbaSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Routes
                            </a>
                            <ul class="dropdown-menu bg-black" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{route('route.index')}}">View All</a></li>
                                <li><a class="dropdown-item" href="{{route('route.create')}}">Create</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('community.index')}}">Community</a>
                        </li>
                        @if(Auth::check())
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('profile.index')}}">Profile</a>
                            </li>
                            <li class="nav-item">
                                <form method="post" action="{{route('auth.logout')}}">
                                    @csrf
                                    <button type="submit" class="btn btn-link special-link">Logout</button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('registration.index')}}">Sign Up</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('login')}}">Sign In</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('route.create')}}">Create</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="row mt-3 justify-content-center">
        <div class="col-sm-10">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>

    <div class="container transparent justify-content-center col-8">
        <div class="row mt-3 justify-content-center">
            <h1 class="col bg-fuxia text-white p-2">@yield("title")</h1>
        </div>

        @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{session('error')}}
            </div>
        @endif

        <main>
            @yield("content")
        </main>
    </div>

</body>
</html>