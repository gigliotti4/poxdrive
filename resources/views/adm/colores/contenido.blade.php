@extends('adm.layouts')

@section('content')

<div class="d-flex justify-content-end ">
 
    <a href="{{route('nuevocolores')}}" class="btn btn-success rounded-pill" >

      <i class="fas fa-plus"></i>
    </a>
  
 </div> 
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
    <tr >
    <th scope="col-"  class="col-md-3">Orden</th>
    <th scope="col" class="col-md-3">Nombre</th>
      <th scope="col" class="col-md-3">Color</th>
      <th scope="col" class="col-md-3">Accion</th>
    </tr>
  </thead>
  <tbody class="my-2">
  	 @foreach($colores as $c)
    <tr class="my-2">
    <th scope="row">{{$c->orden}}</th>
	  <th scope="row">{{$c->nombre}}</th>
	  <th scope="row" style="background-color:{{$c->colores}}; width:100px;" class=" border"></th>
    <td scope="row" class="">
      <a class="btn btn-warning rounded-pill" href="{{route('editarcolores', $c->id)}}" role="button">
        <i class="fas fa-edit"></i>
      </a>
      <a class="btn btn-danger rounded-pill" href="{{route('eliminarcolores', $c->id)}}" role="button">
        <i class="far fa-trash-alt"></i>
      </a>
    </td>
    </tr>
	 @endforeach

  </tbody>
</table>


@endsection