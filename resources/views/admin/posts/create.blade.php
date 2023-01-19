@extends('admin.layouts.app')
@section('title','Criando novo Post')
@section('content')
<h1> Novo Post</h1>

<form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
    @include('admin.posts._partials.form')
</form>

@endsection