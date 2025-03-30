@extends('adm.layouts')
@section('content')

<form method="post" action="{{route('updateusuarios', $usuarios->id)}}" enctype="multipart/form-data">
	@csrf
  @method('put')
  <div class="form-group col-md-6">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" id="name" name="name"  value="{!!$usuarios->name!!}">
    
  </div>
  <div class="form-group col-md-6">
    <label for="username">Usuario</label>
    <input type="text" class="form-control" id="username" name="username" value="{!!$usuarios->username!!}">
  </div>
  <div class="form-group col-md-6">
    <label for="email">Correo</label>
    <input type="email" class="form-control" required id="email" name="email" value="{!!$usuarios->email!!}">
  </div>
  <div class="form-group col-md-6">
    <label for="password">Contraseña</label>
    <input type="password" class="form-control" id="password" name="password" value="">
  </div>
  <div class="col ">
    <button class="btn btn-primary " type="button" onclick="mostrarContrasena()">Mostrar Contraseña</button>
  </div>
  <div class="form-group mb-3 col-md-6">
    <label for="role">Rol</label>
    <select class=" form-control" id="role" name="role" aria-label="Example select with button addon">
      @if($usuarios->role == 1)
      <option value="1" selected>Administrador</option>
      <option value="2" >Usuario</option>
      @else
      <option value="1" >Administrador</option>
      <option value="2" selected>Usuario</option>
      @endif
    </select>
  </div>

 <button type="submit" class="btn btn-success mt-2 d-block mx-auto">Editar</button>
</form>

<script>
    function mostrarContrasena(){
        var tipo = document.getElementById("password");
        if(tipo.type == "password"){
            tipo.type = "text";
        }else{
            tipo.type = "password";
        }
    }
  </script>    
    
@endsection