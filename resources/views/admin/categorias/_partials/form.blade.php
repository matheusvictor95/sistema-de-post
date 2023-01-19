@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@csrf
<div class="mb-3">
    <input class="form-control form-control-lg" type="text" name="name" id="title" placeholder="Título"
        value="{{ $post->title ?? old('title') }}">
    <button type="submit">Enviar</button>
</div>
