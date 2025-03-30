@extends('layouts.plantilla')
@section('title', 'Galeria')
@section('content')

<div class="cabecera__contenedor border-top"> 
    <div class="container">   
        <div class="row">     
            <div class="d-flex align-items-start flex-column bg__cabecera">
                <nav aria-label="breadcrumb" class="breadcrumb-container w-100 mt-auto pb-3">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('page.inicio') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Galeria</li>
                     
                    </ol>
                </nav>
            </div>          
        </div>
    </div>
</div>

<div class="container my-5">
    {{-- <h2 class="text-center mb-4 novedades-titulo">Galería por Categoría</h2> --}}
    
    <div class="categorias-container mb-5">
        <div class="categoria-tabs">
            @foreach ($categorias as $categoria)
                <a class="categoria-btn {{ $categoria_sel == $categoria->id ? 'active' : '' }}" 
                   href="{{route('page.categoria.novedad',$categoria->id)}}">
                    {{$categoria->titulo}}
                </a>
            @endforeach
        </div>
    </div>
    
    <div class="mb-5">
        <div class="novedades-grid">
            @foreach ($novedades as $novedad)
                <div class="novedad-item">
                    <div class="novedad-card">
                        <div class="novedad-image">
                            <img src="{{asset('images/novedades/'.$novedad->imagen)}}" alt="Novedad">
                        </div>
                        @if(isset($novedad->titulo))
                            <div class="novedad-caption">
                                <h5>{{ $novedad->titulo }}</h5>
                                @if(isset($novedad->fecha))
                                    <p class="novedad-fecha">{{ $novedad->fecha }}</p>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


@endsection