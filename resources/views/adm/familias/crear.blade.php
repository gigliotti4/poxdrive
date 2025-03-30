@extends('adm.layouts')



@section('content')



<form method="post" action="{{route('crearfamilias')}}" enctype="multipart/form-data">

	@csrf

  <div class="form-group col-md-6">
    <label for="orden">Orden</label>
    <input type="text" class="form-control" id="orden" name="orden" >
  </div>

  <div class="form-group col-md-6">
    <label for="nombre">nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" >
  </div>

  <div class="form-group col-md-6">

    <label for="imagen">Imagen (Tamaño de imagen 590x290)</label>
    <input type="file" class="form-control-file" required id="imagen" name="imagen" >

  </div>
  





  

  <button type="submit" class="btn btn-success">Agregar</button>

</form>









@endsection
