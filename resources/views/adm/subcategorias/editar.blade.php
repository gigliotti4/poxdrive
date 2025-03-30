@extends('adm.layouts')



@section('content')

<form method="post" action="{{route('updatesubcategorias',$subcategorias->id)}}" enctype="multipart/form-data">

	@csrf

  @method('put')

  <div class="form-group col-md-6">

    <label for="orden">orden</label>

    <input type="text" class="form-control" id="orden" name="orden" value="{{$subcategorias->orden}}">   

  </div>

  <div class="form-group col-md-6">

    <label for="nombre">Nombre</label>

    <input type="text" class="form-control" id="nombre" name="nombre" value="{{$subcategorias->nombre}}">

  </div>


  <h6>Seleccione Categoria</h6>
  <select class="form-control col-md-6" name="categoria_id" required>
      @forelse ($categorias as $cat)
          @if ($subcategorias->categoria_id==$cat->id)
              <option value="{{$cat->id}}" selected>{{$cat->nombre}}</option>
          @else
              <option value="{{$cat->id}}">{{$cat->nombre}}</option>
          @endif
      @empty
          <option value="" disabled selected>Cargue categorias para continuar</option>
      @endforelse
  </select>

<div class="form-group">

    <label for="imagen">Imagen (Tamaño de imagen 590x290)</label>

    <input type="file" class="form-control-file" id="imagen" name="imagen" value="" >
   
    

    <img src="{{asset(Storage::url($subcategorias->imagen))}}" class="img-thumbnail mt-4">

  </div> 







 <button type="submit" class="btn btn-success">Editar</button>

</form>







@endsection