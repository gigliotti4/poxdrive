@extends('adm.layouts')

@section('content')
<a href="{{route('nuevacalidad')}}" class="btn btn-success mb-5" >Nueva Calidad</a>
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
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
    @foreach($calidad as $f)
    <tr>
      <th scope="row">{{$f->orden}}
      </th>
	  <th scope="row">{{$f->nombre}}</th>
    <td>
      <a class="btn btn-warning" href="{{route('editarcalidad', $f->id)}}" role="button">editar</a>
          <a class="btn btn-danger" href="{{route('eliminarcalidad', $f->id)}}" role="button">borrar</a>
    </td>
    </tr>
	 @endforeach
   
  </tbody>
</table>




@endsection