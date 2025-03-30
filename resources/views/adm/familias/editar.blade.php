@extends('adm.layouts')



@section('content')

<form method="post" action="{{route('updatefamilias',$familias->id)}}" enctype="multipart/form-data">

	@csrf

  @method('put')

  <div class="form-group col-md-6">

    <label for="orden">orden</label>
    <input type="text" class="form-control" id="orden" name="orden" value="{{$familias->orden}}">   

  </div>
  <div class="form-group col-md-6">

    <label for="orden">nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" value="{{$familias->nombre}}">   

  </div>

  <div class="form-group">

    <label for="imagen">Imagen (Tamaño de imagen 590x290)</label>
    <input type="file" class="form-control-file" id="imagen" name="imagen" value="" >
    <img src="{{asset(Storage::url($familias->imagen))}}" class="img-thumbnail mt-4">

  </div>




 <button type="submit" class="btn btn-success">Editar</button>

</form>







@endsection




