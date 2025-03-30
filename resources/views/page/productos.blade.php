@extends('layouts.plantilla')
@section('title', $subcategoria->nombre)
@section('content')


<div class="cabecera__contenedor border-top"> 
    <div class="container">   
        <div class="row">     
            <div class="d-flex align-items-start flex-column bg__cabecera">
                <nav aria-label="breadcrumb" class="breadcrumb-container w-100 mt-auto pb-3">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('page.inicio') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('page.subcategorias', $categoria_sel) }}">{{$categoria->nombre}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$subcategoria->nombre}} </li>
                    </ol>
                </nav>
            </div>          
        </div>
    </div>
</div>


<div class="container my-5">
    <div class="row">
        <div class="col-md-3">
            @include('components.categorias-accordion', ['categorias' => $categorias, 'categoria_sel' => $categoria_sel])
        </div> 

        <div class="col-md-9">
            <div class="row">
                @foreach($productos as $producto)
                <div class="col-6 col-lg-4 col-md-4 mt-2" data-aos="fade-up" data-aos-duration="1000">
                    <a href="{{ route('page.producto', $producto->id) }}" class="producto d-flex flex-column align-items-center text-decoration-none">
                        <div class="prodwrap overflow-hidden position-relative">
                            <div class="img-container" style="background-image: url('{{ isset($producto->imagen) ? asset(Storage::url($producto->imagen)) : asset('img/logo.jpg') }}');">
                            </div>
                            <div class="imgoverlay d-flex justify-content-center align-items-center">
                                <i class="fas fa-plus fa-lg"></i>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <span class="productos__titulo">{!! $producto->nombre !!}</span>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection

