@extends('adm.layouts')
@section('content')
<a href="{{route('nuevousuarios')}}" class="btn btn-success mb-5" >Nuevo Usuario</a>
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
      <th scope="col">Usuario</th>
       <th scope="col">Nombre</th> 
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
    <tr>
       @foreach($usuarios as $u)
      <tr>
        <th scope="row" class="">{!!$u->username!!}</th>
        <td scope="row" class="" >{!!$u->name!!}</td>
         {{-- <td scope="row"><img src="{{asset(Storage::url($a->imagen))}}" class="img-thumbnail w-25" ></td> --}}
        <td>
           <a class="btn btn-warning" href="{{route('editarusuarios', $u->id)}}" role="button">editar</a>
           <a class="btn btn-danger" href="{{route('eliminarusuarios', $u->id)}}" role="button">borrar</a>  

        </td>
      </tr>
    
  @endforeach 
    </tr>
   
  </tbody>
</table>

{{-- <div class="contenido">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="background:none;">
                <li class="breadcrumb-item"><a class="breadcrump-element" href="{{ route('') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a class="breadcrump-element" href="{{ route('usuarios') }}">Usuario</a></li>
            </ol>
        </nav>
        @if(session('alert'))
        <div class="msg bg-success text-white text-center py-1 mb-3">
            <p class="m-0">{{session('alert')}}</p>
        </div>
        @endif
        <h5>Usuarios</h5>
        <table class="table datatable">
            <thead>
                <tr>
                <th scope="col">Nombre de usuario</th>
                <th scope="col">Nombre</th>
                <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
            @forelse($usuarios as $user)
                <tr>
                    <td>{!! $user->username !!}</td>
                    <td>{!! $user->name !!}</td>
                    <td>
                        <a href=" {{ route('usuario_show', $user->id)}} " class="btn btn-editar"><i class="material-icons">Crear</i></a>
                        @if(Auth::user()->id != $user->id)
                            <a onclick="return confirm('Realmente desea eliminar este registro?')"  href=" {{ action('eliminarusuarios', $user->id)}} " class="btn btn-eliminar_listado ">
                                <i class="material-icons">delete</i>
                            </a>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td >No existen registros</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div> --}}
@endsection
