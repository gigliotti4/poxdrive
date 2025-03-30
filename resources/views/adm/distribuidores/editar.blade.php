@extends('adm.layouts')



@section('content')

<form method="post" action="{{route('updatedistribuidores',$distribuidores->id)}}" enctype="multipart/form-data">

	@csrf

  @method('put')
<div class="row">

  <div class="form-group col-md-6">
    <label for="orden">orden</label>
    <input type="text" class="form-control" id="orden" name="orden" value="{{$distribuidores->orden}}">   
  </div>

  <div class="form-group col-md-6">
    <label for="empresa">empresa</label>
    <input type="text" class="form-control" id="empresa" name="empresa" value="{{$distribuidores->empresa}}">
  </div>
</div>

<div class="row">
 
  <div class="form-group col-md-6">
    <label for="direccion">direccion</label>
    <input type="text" class="form-control" id="direccion" name="direccion" value="{{$distribuidores->direccion}}">   
  </div>

  <div class="form-group col-md-6">
    <label for="telefono">telefono</label>
    <input type="text" class="form-control" id="telefono" name="telefono" value="{{$distribuidores->telefono}}">
  </div>
  </div>
  
  <div class="form-group col-md-6">
    <label for="mail">mail</label>
    <input type="text" class="form-control" id="mail" name="mail" value="{{$distribuidores->mail}}">
  </div>

  


 <button type="submit" class="btn btn-success">Editar</button>

</form>





@endsection