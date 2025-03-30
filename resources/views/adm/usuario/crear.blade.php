@extends('adm.layouts')
@section('content')
<h3>Nuevo Usuario</h3>
<form method="post" action="{{route('crearusuarios')}}" enctype="multipart/form-data">
	@csrf
  <div class="form-group col-md-6">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" id="name" name="name" >
    
  </div>
  <div class="form-group col-md-6">
    <label for="username">Usuario</label>
    <input type="text" class="form-control" id="username" name="username">
  </div>
  <div class="form-group col-md-6">
    <label for="password">Contraseña</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>

  <div class="form-group col-md-6">
    <label for="email">Correo</label>
    <input type="email" class="form-control" required id="email" name="email">
  </div>

  <div class="form-group mb-3 col-md-6">
    <label for="role">Rol</label>
    <select class=" form-control" id="role" name="role" aria-label="Example select with button addon">
      <option selected></option>
      <option value="1">Administrador</option>
      <option value="2">Usuario</option>
      
    </select>
  </div>
 <button type="submit" class="btn btn-success">Agregar</button>
</form>



      
@endsection