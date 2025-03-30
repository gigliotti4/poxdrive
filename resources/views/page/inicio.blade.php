@extends('layouts.plantilla')
@section('title', 'Inicio')
@section('content')


{{-- Slider Escritorio --}}

<div id="carouselExampleIndicators" class="carousel slide " data-bs-ride="carousel">

    <div class="carousel-inner ">
        @foreach ($sliders as $slider)
         
                <div class="video">
                    <video src="{{asset(Storage::url($slider->imagen))}}" autoplay muted class="slider__video" >
                      
                    </video>
                       <div class="video__content ">
                        
                          <h1 class="d-none d-md-block video__titulo" style="">{!!$slider->titulo!!} </h1>
                           <span class="d-none d-md-block video__descripcion mt-4" style="">{!!$slider->descripcion!!}</span>
                       </div>
                
                   </div>
                     
                    
   
                </div>
          
        @endforeach 
</div>



<div class="container my-5">

    <div class="d-flex my-5">
        <h1 class="contenido__titulo "> Categorias </h1>
        <a href="{{route('page.categorias')}}"  class="contenido__btn ms-auto">
            <button type="button" class="btn btn-ficha px-4 py-2">
            Ver productos
            </button>
            
        </a>
      
    </div>
    
<div class="row ">
         
    @foreach($categorias as $categoria)
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
        @endforeach
                 
    </div>

</div>

<div class="container-fluid my-5">
    
    <div class="row">
        <div class="col-md-6">
                    
            <div class="row " data-aos="fade-right" data-aos-duration="2000" style=" 
            background-image:url({{asset(Storage::url($inicio->imagen))}});
            background-size:cover;
            background-repeat:no-repeat;
            height:600px;
            background-position:center;
            ">
            </div>
               
        </div>
        <div class="col-md-6 p-3" style="">
            <div class="d-flex flex-column p-5"  data-aos="fade-left" data-aos-duration="2000">
                <h1 class="contenido__titulo mt-5">{!!$inicio->titulo!!}</h1>
                <span class="contenido__descripcion my-3">{!!$inicio->descripcion!!}</span>
                
                        
                    <a href="{{route('page.empresa')}}" class="contenido__btn">
                        <button type="button" class="btn btn-inicio px-5 py-2">
                            Más Informacion
                        </button>
                        
                    </a>
               
            </div>         
        </div>        
    </div>
</div>



 <div class="container my-5">
        <div class="d-flex my-5">
                <h1 class="contenido__titulo "> Productos </h1>
                <a href="{{route('page.categorias')}}"  class="contenido__btn ms-auto">
                    <button type="button" class="btn btn-ficha px-4 py-2">
                    Ver productos
                    </button>
                    
                </a>
        </div>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach($productos as $producto)
                        <div class="swiper-slide">
                            <a href="{{ route('page.producto', $producto->id) }}" class="producto d-flex flex-column align-items-center text-decoration-none">
                                <div class="prodwrap">
                                    <div class="img-container" style="background-image: url('{{ isset($producto->imagen) ? asset(Storage::url($producto->imagen)) : asset('img/logo.jpg') }}');">
                                    </div>
                                    <div class="imgoverlay d-flex justify-content-center align-items-center">
                                        <i class="fas fa-plus fa-lg text-white"></i>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <span class="productos__titulo">{!! $producto->nombre !!}</span>
                                </div>
                            </a>
                        </div>
                @endforeach
            </div>
                <!-- Se ha eliminado el div de paginación -->
        </div>
</div> 

@endsection



@section('js')
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: "auto",
            spaceBetween: 30,
            // Se ha añadido la configuración de autoplay
            autoplay: {
                delay: 500,
                disableOnInteraction: false,
            },
            // Se ha eliminado la configuración de paginación
        });
    });
</script>
@endsection