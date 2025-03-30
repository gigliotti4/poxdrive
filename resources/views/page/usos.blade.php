@extends('layouts.plantilla')
@section('title', 'Recursos y Descargas')
@section('content')
<div class="cabecera__contenedor border-top"> 
    <div class="container">   
        <div class="row">     
            <div class="d-flex align-items-start flex-column bg__cabecera">
                <nav aria-label="breadcrumb" class="breadcrumb-container w-100 mt-auto pb-3">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('page.inicio') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Recursos y Descargas</li>
                    </ol>
                </nav>
            </div>          
        </div>
    </div>
</div>

<div class="container usos-container">
   
    
    <div class="categorias-container mb-5">
        <div class="categoria-tabs">
            <a class="categoria-btn active" href="javascript:void(0);" onclick="openTab('pdf', this)">
                Documentos PDF
            </a>
            <a class="categoria-btn" href="javascript:void(0);" onclick="openTab('videos', this)">
                Videos
            </a>
        </div>
    </div>

    <div id="pdf" class="tab-content active">
        <div class="pdf-grid">
            @foreach($usospdf as $pdf)
            <div class="pdf-item">
                <div class="bg__pdf">
                    <div class="pdf__nombre">
                        {{$pdf->nombre}}
                    </div> 
                    <a href="{{route('page.uso-descargar', ['id' => $pdf->id])}}" class="pdf-download" title="Descargar documento">
                        <i class="fas fa-download pdf-icon"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
    <div id="videos" class="tab-content">
        <div class="video-grid">
            @foreach($usosvideos as $video)
            <div class="video-item">
                <div class="video-container">
                    @if(isset($video->youtube))
                        <iframe src="https://www.youtube.com/embed/{{$video->youtube}}" title="{{$video->nombre}}" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    @else
                        <video src="{{asset(Storage::url($video->videos))}}" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop" controls></video>
                    @endif
                </div>
                <div class="video__nombre">
                    {{$video->nombre}}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
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

        // Elimina la clase active de todos los botones de categoría
        var categoryBtns = document.getElementsByClassName("categoria-btn");
        for (var i = 0; i < categoryBtns.length; i++) {
            categoryBtns[i].classList.remove("active");
        }

        // Muestra el contenido de la pestaña seleccionada
        document.getElementById(tabName).style.display = "block";
        document.getElementById(tabName).classList.add("active");

        // Agrega la clase active al botón seleccionado
        element.classList.add("active");
    }
</script>
@endsection