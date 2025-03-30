@extends('adm.layouts')



@section('content')



<form method="post" action="{{route('crearsubcategorias')}}" enctype="multipart/form-data">

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

    <label for="imagen">Imagen (Tamaño de imagen 590x290)</label>

    <input type="file" class="form-control-file" required id="imagen" name="imagen" >
    

  </div>


  <h6>Seleccione Familia</h6>
  <select class="form-control col-md-6" name="categoria_id" required>
      @forelse ($categorias as $cat)
          <option value="{{$cat->id}}">{{$cat->nombre}}</option>
      @empty
          <option value="" disabled selected>Cargue categorias para continuar</option>
      @endforelse
  </select>


  {{-- <div class="form-group col-md-6">

    <label for="imagen">Imagen (Tamaño de imagen 590x290)</label>

    <input type="file" class="form-control-file" required id="imagen" name="imagen" >
    

  </div> --}}



  

  <button type="submit" class="btn btn-success mt-3">Agregar</button>

</form>









@endsection