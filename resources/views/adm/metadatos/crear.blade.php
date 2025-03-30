@extends('adm.layouts')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Crear Metadatos
                        <a href="{{ route('metadatos') }}" class="btn btn-primary float-right">Volver</a>
                    </h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('metadatos.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="seccion">Sección</label>
                            <input type="text" name="seccion" id="seccion" class="form-control" required>
                            <small class="form-text text-muted">Ejemplos: home, productos, items, contacto, etc.</small>
                        </div>
                        <div class="form-group">
                            <label for="keyword">Keywords</label>
                            <input type="text" name="keyword" id="keyword" class="form-control" required>
                            <small class="form-text text-muted">Palabras clave separadas por comas</small>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
