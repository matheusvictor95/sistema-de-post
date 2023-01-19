<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <title>@yield('title') {{ config('app.name') }}</title>
</head>

<body>
    <div class="app">
        <nav class="navbar navbar-expand navbar-dark bg-primary" aria-label="Second navbar example">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('posts.index') }}">Sistema de Posts</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExample02">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a href="{{ route('posts.index') }}" class="nav-link active" aria-current="page"
                                href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('categoria.index') }}" class="nav-link">Categorias</a>
                        </li>

                    </ul>
                    <form>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        {{-- <input class="form-control" type="text" placeholder="Search" aria-label="Search"> --}}
                    </form>

                </div>
            </div>
        </nav>


    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

    <main class="py-4">
        @yield('content')
    </main>
</body>

</html>
