@extends('dashboard.master')


@section('content')

@include('dashboard.partials.validation-error')
 
    <form action="{{ route("post.store")}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titulo</label>
            <input type="text" name="title" id="title" class="form-control">

            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            
        </div>
        <div class="mb-3">
            <label for="url-clean" class="form-label">Url limpia</label>
            <input type="text" name="url-clean" id="url-clean" class="form-control">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Contenido</label>
        <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
        </div>
        <div class="col-auto">
            <input type="submit" class="btn btn-primary" value="Enviar">
        </div>
    
    </form>
@endsection
