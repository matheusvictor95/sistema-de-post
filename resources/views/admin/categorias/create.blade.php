@extends('admin.layouts.app')
@section('title','Criando nova Categoria')
@section('content')
<h1> Nova Categoria</h1>

<form action="{{ route('categoria.store') }}" method="post" enctype="multipart/form-data">
     @include('admin.categorias._partials.form')
</form>
{{-- <div class="mb-3">
    
    <input class="form-control form-control-lg" type="text" name="title" id="title" placeholder="Título"
        value="{{ $categoria->title ?? old('title') }}">
    
    <button type="submit">Cadastrar</button>
</div> --}}

@endsection