@extends('layouts.plantilla')

@section('title', 'Categorias')

@section('content')
<div class="cabecera__contenedor border-top"> 
    <div class="container">   
        <div class="row">     
            <div class="d-flex align-items-start flex-column bg__cabecera">
                <nav aria-label="breadcrumb" class="breadcrumb-container w-100 mt-auto pb-3">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('page.inicio') }}">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Categorias</li>
                    </ol>
                </nav>
            </div>          
        </div>
    </div>
</div>


<div class="container my-5">
    
    <div class="row ">
         

        
            
                    @foreach($categorias as $categoria)
                    @if(isset($categoria->imagen))
                    <div class="col-6 col-lg-3 col-md-3 mt-2" data-aos="fade-up" data-aos-duration="1000">
                <a href="{{ route('page.subcategorias', $categoria->id) }}" class="producto d-flex flex-column align-items-center text-decoration-none">
                    <div class="prodwrap overflow-hidden position-relative">
                        <div class="img-container" style="background-image: url('{{ isset($categoria->imagen) ? asset(Storage::url($categoria->imagen)) : asset('img/logo.jpg') }}');">
                        </div>
                        <div class="imgoverlay d-flex justify-content-center align-items-center">
                            <i class="fas fa-plus fa-lg"></i>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <span class="productos__titulo">{!! $categoria->nombre !!}</span>
                    </div>
                </a>
            </div>
                    @else

                    <div class="col-lg-4 col-md-4 mt-2" data-aos="fade-up" data-aos-duration="1000">
                <a href="{{ route('page.subcategorias', $categoria->id) }}" class="producto d-flex flex-column align-items-center text-decoration-none">
                    <div class="prodwrap overflow-hidden position-relative">
                        <div class="img-container" style="background-image: url('{{ isset($categoria->imagen) ? asset(Storage::url($categoria->imagen)) : asset('img/logo.jpg') }}');">
                        </div>
                        <div class="imgoverlay d-flex justify-content-center align-items-center">
                            <i class="fas fa-plus fa-lg"></i>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <span class="productos__titulo">{!! $categoria->nombre !!}</span>
                    </div>
                </a>
            </div>
                    @endif
                
                    @endforeach
                
           
           
        </div>

</div>




    @endsection

 