@extends('layouts.plantilla')


@section('title', 'Distribuidores')

@section('content')

<div class="cabecera__contenedor border-top"> 
  <div class="container">   
      <div class="row">     
          <div class="d-flex align-items-start flex-column bg__cabecera">
              <nav aria-label="breadcrumb" class="breadcrumb-container w-100 mt-auto pb-3">
                  <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item"><a href="{{ route('page.inicio') }}">Inicio</a></li>
                      <li class="breadcrumb-item active" aria-current="page">distribuidores</li>
                  </ol>
              </nav>
          </div>          
      </div>
  </div>
</div>


<div class="container my-5">
  <div class="row">
    @foreach($distribuidores as $d)
    
    <div class="col-md-4 mb-4">  
        <div class="distribuidor-card p-4 rounded shadow-sm transition-card h-100">
          <div class="card-header-custom mb-3">
            <h3 class="distribuidores__empresa font-weight-bold">
              {{$d->empresa}}
            </h3>
          </div>
          <div class="card-body-custom">
            <div class="info-item mb-3">
              <i class="fas fa-map-marker-alt icon-distribuidor me-2"></i>
              <span class="distribuidores__direccion">
                {{$d->direccion}}
              </span>
            </div>
            <div class="info-item mb-3">
              <i class="fas fa-phone icon-distribuidor me-2"></i>
              <span class="distribuidores__telefono">
                {{$d->telefono}}
              </span>
            </div>
            <div class="info-item">
              <i class="fas fa-envelope icon-distribuidor me-2"></i>
              <a href="mailto:{{$d->mail}}" class="distribuidores__mail">
                {{$d->mail}}
              </a>
            </div>
          </div>
        </div>
    </div>
    @endforeach
  </div>
</div>



@endsection

