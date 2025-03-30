@extends('adm.layouts')



@section('content')



<form method="post" action="{{route('crearusos')}}" enctype="multipart/form-data">

	@csrf

  <div class="row">

    <div class="form-group col-md-6">
  
      <label for="orden">Orden</label>
  
      <input type="text" class="form-control" id="orden" name="orden" >  
  
    </div>
  
    <div class="form-group col-md-6">
  
      <label for="nombre">Nombre</label>
      <input type="text" class="form-control" id="nombre" required name="nombre">
  
    </div>
  </div>

<div class="row">
  <div class="form-group col-md-6">
    <label for="youtube">youtube</label>
    <input type="text" class="form-control" id="youtube"  name="youtube">
    <span>
      https://www.youtube.com/watch?v=
      <strong>xxxx</strong>
    </span>
  </div>
  <div class="form-group mb-3 col-md-6">
    <label for="role">Categoria</label>
    <select class=" form-control" id="rol" name="rol" aria-label="Example select with button addon">
      <option selected>Elegir Categoria</option>
      <option value="pdf">pdf</option>
      <option value="video">video</option>
      
    </select>
  </div>
</div>

<div class="row">

  <div class="form-group col-md-6">
  
    <label for="videos">videos</label>
    <input type="file" class="form-control-file" id="videos" name="videos" >
    
  
  </div>
  <div class="form-group col-md-6">
    
    <label for="pdf">pdf</label>
    <input type="file" class="form-control-file" id="pdf" name="pdf" >
    
  
  </div>
</div>




  <button type="submit" class="btn btn-success">Agregar</button>

</form>









@endsection