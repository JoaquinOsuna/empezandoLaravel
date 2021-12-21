@extends('dashboard.master')


@section('content')

        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titulo</label>
            <input readonly type="text" name="title" id="title" class="form-control" value="{{ $category->title}}">

            
        </div>
        <div class="mb-3">
            <label for="url_clean" class="form-label">Url limpia</label>
            <input readonly type="text" name="url_clean" id="url_clean" class="form-control" value="{{ $category->url_clean}}">
        </div>
@endsection