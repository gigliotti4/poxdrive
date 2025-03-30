@extends('adm.layouts')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Editar Metadatos
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
                    <form action="{{ route('metadatos.update', $metadato->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="seccion">Sección</label>
                            <input type="text" name="seccion" id="seccion" class="form-control" value="{{ $metadato->seccion }}" required>
                            <small class="form-text text-muted">Ejemplos: home, productos, items, contacto, etc.</small>
                        </div>
                        <div class="form-group">
                            <label for="keyword">Keywords</label>
                            <input type="text" name="keyword" id="keyword" class="form-control" value="{{ $metadato->keyword }}" required>
                            <small class="form-text text-muted">Palabras clave separadas por comas</small>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required>{{ $metadato->descripcion }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
