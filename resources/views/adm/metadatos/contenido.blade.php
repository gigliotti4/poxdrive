@extends('adm.layouts')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Metadatos
                        <a href="{{ route('metadatos.crear') }}" class="btn btn-success float-right">Agregar Nuevo</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Sección</th>
                                <th>Keywords</th>
                                <th>Descripción</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($metadatos as $meta)
                            <tr>
                                <td>{{ $meta->id }}</td>
                                <td>{{ $meta->seccion }}</td>
                                <td>{{ $meta->keyword }}</td>
                                <td>{{ $meta->descripcion }}</td>
                                <td>
                                    <a href="{{ route('metadatos.editar', $meta->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                    <form action="{{ route('metadatos.eliminar', $meta->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
