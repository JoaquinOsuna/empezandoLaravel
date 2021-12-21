@extends('dashboard.master')


@section('content')

        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titulo</label>
            <input readonly type="text" name="title" id="title" class="form-control" value="{{ $post->title}}">

            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            
        </div>
        <div class="mb-3">
            <label for="url_clean" class="form-label">Url limpia</label>
            <input readonly type="text" name="url_clean" id="url_clean" class="form-control" value="{{ $post->url_clean}}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Contenido</label>
        <textarea readonly class="form-control" name="content" id="content" cols="30" rows="10">{{ $post->content}}</textarea>
        </div>
@endsection