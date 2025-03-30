@extends('adm.layouts')

@section('content')
<a href="{{route('nuevoitems')}}" class="btn btn-success mb-5" >Nuevo Item</a>
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
{{-- <div class="mb-4">
    <form action="{{route('items_import_excel')}}" accept-charset="UTF-8" enctype="multipart/form-data" method="POST">
        @csrf
        <h4><b>Importar items</b></h4>
        <input type="file" name="file" id="fileinput">
        <button disabled id="file_submint">Importar</button>
    </form>
</div> --}}

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
  	 @foreach($items as $c)
   
    <tr>
      <th scope="row">{{$c->orden}}</th>
      <th scope="row">{{$c->familias()->nombre}}</th> 
    
      
    <th scope="row">{{$c->nombre}}</th>
    <td> 
      <a class="btn btn-warning" href="{{route('editaritems', $c->id)}}" role="button">editar</a>
           <a class="btn btn-danger" href="{{route('eliminaritems', $c->id)}}" role="button">borrar</a>
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