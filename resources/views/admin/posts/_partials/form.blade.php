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
    <input class="form-control form-control-lg" type="file" name="image" id="image">
    <input class="form-control form-control-lg" type="text" name="title" id="title" placeholder="Título"
        value="{{ $post->title ?? old('title') }}">
    <label for="categoria">Categoria</label>
    <select name="categoria_id" class="form-control form-control-sm">
        @foreach ($categoria as $cat)
            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
        @endforeach
    </select>
    <textarea class="form-control" name="content" id="content" cols="30" rows="4" placeholder="Conteúdo">{{ $post->content ?? old('content') }}</textarea>
    <button type="submit">Enviar</button>
</div>
