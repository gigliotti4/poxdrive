@extends('adm.layouts')

@section('content')
<a href="{{route('nuevoproductos')}}" class="btn btn-success mb-5" >Nuevo Producto</a>
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
@if(session()->has('danger'))
    <div class="alert alert-danger">
        {{ session()->get('danger') }}
    </div>
@endif
<div class="mb-4">
    <form action="{{route('productos_import_excel')}}" accept-charset="UTF-8" enctype="multipart/form-data" method="POST">
        @csrf
        <h4><b>Importar productos</b></h4>
        <input type="file" name="file" id="fileinput">
        <button disabled id="file_submint">Importar</button>
    </form>
</div>
<table class="table">
  <thead>
    <tr>
    <th scope="col">Orden</th>
    
    <th scope="col">categoria</th>
    <th scope="col">subcategoria</th>
    <th scope="col">nombre</th>
    <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
  	 @foreach($productos as $c)
    
    <tr>
      <th scope="row">{{$c->orden}}</th>
      <th scope="row">{{@$c->categorias()->nombre}}</th> 
      @if(@$c->subcategoria() == null)
      
      <th></th>
      @else
      <th scope="row">{{@$c->subcategoria->nombre}}</th>
      
      @endif
      
    <th scope="row">{{$c->nombre}}</th>
    <td> 
      <a class="btn btn-warning" href="{{route('editarproductos', $c->id)}}" role="button">editar</a>
           <a class="btn btn-danger" href="{{route('eliminarproductos', $c->id)}}" role="button">borrar</a>
           <a href="{{ route('duplicarproductos', ['id' => $c->id]) }}" class="btn btn-primary">Duplicar Producto</a>

    </td>
    </tr>
	 @endforeach

  </tbody>
</table>

<script>
    document.getElementById("fileinput").onchange = function(e) {
      if(this.value != null){
           $('#file_submint').removeAttr("disabled")
      } 
    }
</script>

@endsection