@extends('layouts.plantilla')

@section('title', 'Aplicaciones')
@section('content')

<div class="cabecera__contenedor border-top"> 
    <div class="container">   
        <div class="row">     
            <div class="d-flex align-items-start flex-column bg__cabecera">
                <nav aria-label="breadcrumb" class="breadcrumb-container w-100 mt-auto pb-3">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('page.inicio') }}">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Uso y Aplicaciones</li>
                    </ol>
                </nav>
            </div>          
        </div>
    </div>
</div>

<div class="container py-4">
    <div class="row">
        <!-- Sidebar de categorías con formato actualizado -->
        <div class="col-md-3">
            <div class="categorias-sidebar p-3 mb-4">
                <h4 class="sidebar-title mb-3">Uso y Aplicaciones</h4>
                <div class="categoria-links">
                    <a class="categoria-link d-block py-2 active" onclick="openTab('Panificadora', this)" style="cursor:pointer;">
                        Panificadora
                    </a>
                    <a class="categoria-link d-block py-2" onclick="openTab('Alimenticia', this)" style="cursor:pointer;">
                        Alimenticia
                    </a>
                    <a class="categoria-link d-block py-2" onclick="openTab('Bebidas', this)" style="cursor:pointer;">
                        Bebidas
                    </a>
                    <a class="categoria-link d-block py-2" onclick="openTab('Farmaceutica', this)" style="cursor:pointer;">
                        Farmaceútica
                    </a>
                    <a class="categoria-link d-block py-2" onclick="openTab('Metal', this)" style="cursor:pointer;">
                        Metal mecánica
                    </a>
                    <a class="categoria-link d-block py-2" onclick="openTab('Petrolera', this)" style="cursor:pointer;">
                        Petrolera
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Contenido principal con sombra y bordes redondeados -->
        <div class="col-md-9">
            <div class="d-flex flex-column bg-white p-3 rounded ">
                <div id="Panificadora" class="tab-content active">
                    <div class="productos__titulo mb-3 fw-bold border-bottom pb-2">
                    Panificadora
                    </div>
                    <div class="row g-3">
                        @foreach($panificadora as $pa)
                        <div class="col-6 col-lg-4 col-md-4 mt-2" data-aos="fade-up" data-aos-duration="1000">
                            <a href="{{route('page.producto', $pa->id)}}" class="producto d-flex flex-column align-items-center text-decoration-none">
                                <div class="prodwrap overflow-hidden position-relative">
                                    <div class="img-container" style="background-image: url('{{asset(Storage::url($pa->imagen))}}');">
                                    </div>
                                    <div class="imgoverlay d-flex justify-content-center align-items-center">
                                        <i class="fas fa-plus fa-lg"></i>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <span class="productos__subtitulo d-block  mb-1">{{$pa->categorias()->nombre}}</span>
                                    <span class="productos__titulo">{!!$pa->nombre!!}</span>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div id="Alimenticia" class="tab-content">
                    <div class="productos__titulo mb-3 fw-bold border-bottom pb-2">
                    Alimenticia
                    </div>
                    <div class="row g-3">
                        @foreach($alimenticia as $alimen)
                        <div class="col-6 col-lg-4 col-md-4 mt-2" data-aos="fade-up" data-aos-duration="1000">
                            <a href="{{route('page.producto', $alimen->id)}}" class="producto d-flex flex-column align-items-center text-decoration-none">
                                <div class="prodwrap overflow-hidden position-relative">
                                    <div class="img-container" style="background-image: url('{{asset(Storage::url($alimen->imagen))}}');">
                                    </div>
                                    <div class="imgoverlay d-flex justify-content-center align-items-center">
                                        <i class="fas fa-plus fa-lg"></i>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <span class="productos__subtitulo d-block  mb-1">{{$alimen->categorias()->nombre}}</span>
                                    <span class="productos__titulo">{!!$alimen->nombre!!}</span>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div id="Bebidas" class="tab-content">
                    <div class="productos__titulo mb-3 fw-bold border-bottom pb-2">
                    Bebidas
                    </div>
                    <div class="row g-3">
                        @foreach($bebidas as $bebi)
                        <div class="col-6 col-lg-4 col-md-4 mt-2" data-aos="fade-up" data-aos-duration="1000">
                            <a href="{{route('page.producto', $bebi->id)}}" class="producto d-flex flex-column align-items-center text-decoration-none">
                                <div class="prodwrap overflow-hidden position-relative">
                                    <div class="img-container" style="background-image: url('{{asset(Storage::url($bebi->imagen))}}');">
                                    </div>
                                    <div class="imgoverlay d-flex justify-content-center align-items-center">
                                        <i class="fas fa-plus fa-lg"></i>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <span class="productos__subtitulo d-block  mb-1">{{$bebi->categorias()->nombre}}</span>
                                    <span class="productos__titulo">{!!$bebi->nombre!!}</span>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div id="Farmaceutica" class="tab-content">
                    <div class="productos__titulo mb-3 fw-bold border-bottom pb-2">
                    Farmaceútica
                    </div>
                    <div class="row g-3">
                        @foreach($farmaceuticas as $farma)
                        <div class="col-6 col-lg-4 col-md-4 mt-2" data-aos="fade-up" data-aos-duration="1000">
                            <a href="{{route('page.producto', $farma->id)}}" class="producto d-flex flex-column align-items-center text-decoration-none">
                                <div class="prodwrap overflow-hidden position-relative">
                                    <div class="img-container" style="background-image: url('{{asset(Storage::url($farma->imagen))}}');">
                                    </div>
                                    <div class="imgoverlay d-flex justify-content-center align-items-center">
                                        <i class="fas fa-plus fa-lg"></i>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <span class="productos__subtitulo d-block  mb-1">{{$farma->categorias()->nombre}}</span>
                                    <span class="productos__titulo">{!!$farma->nombre!!}</span>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div id="Metal" class="tab-content">
                    <div class="productos__titulo mb-3 fw-bold border-bottom pb-2">
                    Metal mecánica
                    </div>
                    <div class="row g-3">
                        @foreach($metal as $meta)
                        <div class="col-6 col-lg-4 col-md-4 mt-2" data-aos="fade-up" data-aos-duration="1000">
                            <a href="{{route('page.producto', $meta->id)}}" class="producto d-flex flex-column align-items-center text-decoration-none">
                                <div class="prodwrap overflow-hidden position-relative">
                                    <div class="img-container" style="background-image: url('{{asset(Storage::url($meta->imagen))}}');">
                                    </div>
                                    <div class="imgoverlay d-flex justify-content-center align-items-center">
                                        <i class="fas fa-plus fa-lg"></i>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <span class="productos__subtitulo d-block  mb-1">{{$meta->categorias()->nombre}}</span>
                                    <span class="productos__titulo">{!!$meta->nombre!!}</span>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div id="Petrolera" class="tab-content">
                    <div class="productos__titulo mb-3 fw-bold border-bottom pb-2">
                    Petrolera
                    </div>
                    <div class="row g-3">
                        @foreach($petrolera as $petro)
                        <div class="col-6 col-lg-4 col-md-4 mt-2" data-aos="fade-up" data-aos-duration="1000">
                            <a href="{{route('page.producto', $petro->id)}}" class="producto d-flex flex-column align-items-center text-decoration-none">
                                <div class="prodwrap overflow-hidden position-relative">
                                    <div class="img-container" style="background-image: url('{{asset(Storage::url($petro->imagen))}}');">
                                    </div>
                                    <div class="imgoverlay d-flex justify-content-center align-items-center">
                                        <i class="fas fa-plus fa-lg"></i>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <span class="productos__subtitulo d-block  mb-1">{{$petro->categorias()->nombre}}</span>
                                    <span class="productos__titulo">{!!$petro->nombre!!}</span>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('css')
<style>

   
    
    /* Ajustes responsivos */
    @media (max-width: 768px) {
        .col-md-3 {
            margin-bottom: 20px;
        }
    }
</style>
@endsection

@section('js')
<script>
    function openTab(tabName, element) {
        // Oculta todos los contenidos de las pestañas
        var tabContents = document.getElementsByClassName("tab-content");
        for (var i = 0; i < tabContents.length; i++) {
            tabContents[i].style.display = "none";
            tabContents[i].classList.remove("active");
        }

        // Elimina la clase active de todos los enlaces de categoría
        var categoryLinks = document.getElementsByClassName("categoria-link");
        for (var i = 0; i < categoryLinks.length; i++) {
            categoryLinks[i].classList.remove("active");
        }

        // Muestra el contenido de la pestaña seleccionada
        document.getElementById(tabName).style.display = "block";
        document.getElementById(tabName).classList.add("active");

        // Agrega la clase active al enlace de categoría seleccionado
        if (element) {
            element.classList.add("active");
        }
    }
    
    // Inicializar AOS (Animate On Scroll) con opciones personalizadas
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            mirror: false
        });
    });
</script>
@endsection