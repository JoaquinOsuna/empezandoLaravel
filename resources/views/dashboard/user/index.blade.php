@extends('dashboard.master')


@section('content')

<a class='btn btn-info mt-3 mb-3' href="{{ route('user.create')}}">
    Crear
</a>
<table class="table">
    <thead>
        <tr>
            <td>Id</td>
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Rol</td>
            <td>Mail</td>
            <td>Actualizacion</td>
            <td>Acciones</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->surname}}</td>
            <td>{{$user->rol->key}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->created_at->format('Y-M-d')}}</td>
            <td>{{$user->updated_at->format('Y-M-d')}}</td>
            <td>
            <a href="{{route('user.show', $user->id)}}" class="btn btn-primary ">Ver</a>
            <a href="{{route('user.edit', $user->id)}}" class="btn btn-primary ">Actualizar</a>
            <button data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $user->id }}" class="btn btn-danger">Eliminar</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $users->links()}}


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
          <form id="formDelete" action="{{route('user.destroy', 0)}}" data-action="{{route('user.destroy', 0)}}" method="POST">
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


        modalTitle.textContent = 'Vas a borrar el user: ' + recipient
        })
    }
  </script>
@endsection

