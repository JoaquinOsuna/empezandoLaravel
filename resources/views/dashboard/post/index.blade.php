@extends('dashboard.master')


@section('content')

<a class='btn btn-info mt-3 mb-3' href="{{ route('post.create')}}">
    Crear
</a>
<table class="table">
    <thead>
        <tr>
            <td>Id</td>
            <td>Titulo</td>
            <td>Categoria</td>
            <td>Posteado</td>
            <td>Creacion</td>
            <td>Actualizacion</td>
            <td>Acciones</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->category->title}}</td>
            <td>{{$post->posted}}</td>
            <td>{{$post->created_at->format('Y-M-d')}}</td>
            <td>{{$post->updated_at->format('Y-M-d')}}</td>
            <td>
            <a href="{{route('post.show', $post->id)}}" class="btn btn-primary ">Ver</a>
            <a href="{{route('post.edit', $post->id)}}" class="btn btn-primary ">Actualizar</a>
            <button data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $post->id }}" class="btn btn-danger">Eliminar</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $posts->links()}}


<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel">Borrar</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <p>¿Seguro que desea borral el registro seleccionado?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <form id="formDelete" action="{{route('post.destroy', 0)}}" data-action="{{route('post.destroy', 0)}}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">Borrar</button>
        </form>
          
        </div>
      </div>
    </div>
  </div>


  <script>
    window.onload = function(){
        var deleteModal = document.getElementById('deleteModal')
        deleteModal.addEventListener('show.bs.modal', function (event) {   
        var button = event.relatedTarget

        var recipient = button.getAttribute('data-id')
        action = document.getElementById('formDelete').getAttribute('data-action').slice(0,-1)
        action += recipient
        console.log(action)

        var modalTitle = deleteModal.querySelector('.modal-title')
        
        document.getElementById('formDelete').setAttribute('action', action)


        modalTitle.textContent = 'Vas a borrar el post: ' + recipient
        })
    }
  </script>
@endsection

