@extends('dashboard.master')


@section('content')

@include('dashboard.partials.validation-error')
<form action="{{ route("post.update", $post->id)}}" method="POST">
    @method('PUT')
    @include('dashboard.post._form')
</form>
<br>


{{-- <form action="{{ route("post.upd", $post->id)}}" method="POST" enctype="multipart/form-data"> 
    <div class="row">
        <div class="col">
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="col">
            <input type="submit" class="btn btn-primary"value="Subir">
        </div>
    </div>
</form> --}}
<br>

@endsection
