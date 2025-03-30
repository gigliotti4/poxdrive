@extends('adm.layouts')



@section('content')



<form method="post" action="{{route('creardistribuidores')}}" enctype="multipart/form-data">

	@csrf

  <div class="row">

    <div class="form-group col-md-6">
      <label for="orden">Orden</label>
      <input type="text" class="form-control" id="orden" name="orden" >  
    </div>
  
    <div class="form-group col-md-6">
      <label for="empresa">empresa</label>
      <input type="text" class="form-control" id="empresa" required name="empresa">
    </div>
  </div>
  <div class="row">

    <div class="form-group col-md-6">
      <label for="direccion">direccion</label>
      <input type="text" class="form-control" id="direccion" name="direccion" >  
    </div>
  
    <div class="form-group col-md-6">
      <label for="telefono">telefono</label>
      <input type="text" class="form-control" id="telefono"  name="telefono">
    </div>
  </div>
  <div class="form-group col-md-6">
    <label for="mail">mail</label>
    <input type="text" class="form-control" id="mail"  name="mail">
  </div>







  <button type="submit" class="btn btn-success">Agregar</button>

</form>









@endsection