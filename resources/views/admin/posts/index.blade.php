@extends('admin.layouts.app')
@section('title', 'Listagem dos Posts')

@section('content')

    <div class="container">
        <a class="btn btn-secondary" href="{{ route('posts.create') }}" 
            > Novo Post <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                fill="currentColor" class="bi bi-envelope-plus" viewBox="0 0 16 16">
                <path
                    d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z">
                </path>
                <path
                    d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z">
                </path>
            </svg> </a>
        <hr>
        @if (session('message'))
            <div>
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('posts.search') }}" method="post" class="form-inline">
            @csrf
            <input type="text" name="search" placeholder="Filtrar">
            <button class="btn btn-outline-success " type="submit">Filtrar</button>
        </form>
        </nav>
        <h1> Posts </h1>
                @foreach ($posts as $post)
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ url('../storage/app/public/' . $post->image) }}" class="img-fluid rounded-start"
                            alt="{{$post->image}}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Título:<br> {{ $post->title }}</h5>
                            <p class="card-text">Categoria: <br> {{$post->categoria->name}}</p>
                            <p class="card-text">Contéudo: <br> {{ $post->content }}</p>

                           

                            <a href="{{ route('posts.show', $post->id) }}"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-eye-fill"
                                    viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                    <path
                                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                </svg></a>
                            <a href="{{ route('posts.edit', $post->id) }}"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-pen-fill"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                </svg></a>

                        </div>
                    </div>
                </div>
            </div>
            </>
        @endforeach
        <hr>

        @if (isset($filters))
            {{ $posts->appends($filters)->links() }}
        @else
            {{ $posts->links() }}
        @endif

    </div>

@endsection
