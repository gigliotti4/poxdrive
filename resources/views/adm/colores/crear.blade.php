@extends('adm.layouts')

@section('content')

<form method="post" action="{{route('crearcolores')}}" enctype="multipart/form-data">
	@csrf
  <div class="row">

    <div class="form-group col-md-4">
      <label for="orden">orden</label>
      <input type="text" class="form-control" id="orden" name="orden" >
      
    </div>
    
  </div>
  <div class="row">

    <div class="form-group col-md-4">
      <label for="nombre">Nombre</label>
      <input type="text" class="form-control" id="nombre" name="nombre">
    </div>
    <div class="form-group col-md-4">
      <label for="colores">Colores</label>
      <input type="color" class="form-control" id="colores" name="colores">
    </div>
    
  </div>
  
  
 <button type="submit" class="btn btn-success">Agregar</button>
</form>



@endsection