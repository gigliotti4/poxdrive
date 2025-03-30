@extends('adm.layouts')



@section('content')



<form method="post" action="{{route('crearcategorias')}}" enctype="multipart/form-data">

	@csrf

  <div class="form-group col-md-6">

    <label for="orden">Orden</label>

    <input type="text" class="form-control" id="orden" name="orden" >

    

  </div>

  <div class="form-group col-md-6">

    <label for="nombre">Nombre</label>

    <input type="text" class="form-control" id="nombre" required name="nombre">

  </div>
  <div class="form-group col-md-6">
    <label for="imagen">Imagen  (Tamaño recomendado: 1080X1080 px)</label>
    <input type="file" class="form-control-file" id="imagen" name="imagen">
    
  </div>


  <button type="submit" class="btn btn-success">Agregar</button>

</form>









@endsection