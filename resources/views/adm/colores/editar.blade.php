@extends('adm.layouts')

@section('content')
<form method="post" action="{{route('updatecolores',$colores->id)}}" enctype="multipart/form-data">
	@csrf
  @method('put')
  <div class="form-group">
    <label for="orden">orden</label>
    <input type="text" class="form-control" id="orden" name="orden" value="{{$colores->orden}}">   
  </div>

  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" value="{{$colores->nombre}}">
  </div>
  <div class="form-group">
    <label for="colores">Colores</label>
    <input type="color" class="form-control" id="colores" name="colores" value="{{$colores->colores}}">
  </div>
   
  
 <button type="submit" class="btn btn-success">Editar</button>
</form>


@endsection
