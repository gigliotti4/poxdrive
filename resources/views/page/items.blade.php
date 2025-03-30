@extends('layouts.plantilla')

@section('title', $item->nombre)

@section('content')
<div class="cabecera__contenedor border-top"> 
    <div class="container">   
        <div class="row">     
            <div class="d-flex align-items-start flex-column bg__cabecera">
                <nav aria-label="breadcrumb" class="breadcrumb-container w-100 mt-auto pb-3">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('page.inicio') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Herramientas</li>
                    </ol>
                </nav>
            </div>          
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row">
        <!-- Sidebar de categorías -->
        <div class="col-md-3">
            <div class="categorias-sidebar p-3 mb-4">
                <h4 class="sidebar-title mb-3">Familias</h4>
                <div class="categoria-links">
                    @foreach($familias as $familia)
                    <a class="categoria-link d-block py-2 {{$familia_sel==$familia->id ? 'active' : ''}}" 
                       href="{{route('page.items', $familia->id)}}">
                        {{$familia->nombre}}
                    </a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Contenido principal -->
        <div class="col-md-9">
            <div class="row">
                @foreach($items as $item)
                @if(isset($item->imagen))
                <div class="col-6 col-lg-4 col-md-4 mb-4" data-aos="fade-up" data-aos-duration="1000">
                    <a href="{{route('page.item', $item->id)}}" class="producto d-flex flex-column align-items-center text-decoration-none">
                        <div class="prodwrap overflow-hidden position-relative">
                            <div class="img-container" style="background-image: url('{{asset(Storage::url($item->imagen))}}');">
                            </div>
                            <div class="imgoverlay d-flex justify-content-center align-items-center">
                                <i class="fas fa-plus fa-lg"></i>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <span class="productos__subtitulo d-block">{{$item->familias()->nombre}}</span>
                            <span class="productos__titulo">{!!$item->nombre!!}</span>
                        </div>
                    </a>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection