@extends('adm.layouts')

@section('content')
<a href="{{route('nuevosubcategorias')}}" class="btn btn-success mb-5" >Nueva subcategoria</a>
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
<table class="table">
  <thead>
    <tr>
    <th scope="col">Orden</th>
    <th scope="col">Categoria</th>
      <th scope="col">nombre</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
    @foreach($subcategorias as $sub)

    <tr>
      <th scope="row">{{$sub->orden}}
      </th>
        <th scope="row">{{$sub->categoria->nombre}}</th>
	  <th scope="row">{{$sub->nombre}}</th>
    <td>
       <a class="btn btn-warning" href="{{route('editarsubcategorias', $sub->id)}}" role="button">editar</a>
      <a class="btn btn-danger" href="{{route('eliminarsubcategorias', $sub->id)}}" role="button">borrar</a> 
    </td>
    </tr>
	 @endforeach
   
  </tbody>
</table>




@endsection