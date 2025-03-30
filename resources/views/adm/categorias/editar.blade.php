@extends('adm.layouts')



@section('content')

<form method="post" action="{{route('updatecategorias',$categorias->id)}}" enctype="multipart/form-data">

	@csrf

  @method('put')

  <div class="form-group col-md-6">

    <label for="orden">orden</label>

    <input type="text" class="form-control" id="orden" name="orden" value="{{$categorias->orden}}">   

  </div>

  <div class="form-group col-md-6">

    <label for="nombre">Nombre</label>

    <input type="text" class="form-control" id="nombre" name="nombre" value="{{$categorias->nombre}}">

  </div>

  <div class="form-group">

    <label for="imagen">Imagen (Tamaño de imagen 590x290)</label>

    <input type="file" class="form-control-file" id="imagen" name="imagen" value="" >
   
    

    <img src="{{asset(Storage::url($categorias->imagen))}}" class="img-thumbnail mt-4">

  </div>



  <div class="d-flex flex-column col-md-6">   

    <span>Categoria destacados</span>

    <div class="form-check form-check-inline">

      <label class="form-check-label mr-3" for="inlineCheckbox1">Si</label>

      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="destacado" @if($categorias->destacado == 1) checked="" @endif>

    </div>

    

</div>



 <button type="submit" class="btn btn-success">Editar</button>

</form>







@endsection