@extends('layouts.plantilla')

@section('title', $producto->nombre)

@section('content')
<div class="cabecera__contenedor border-top"> 
    <div class="container">   
        <div class="row">     
            <div class="d-flex align-items-start flex-column bg__cabecera">
                <nav aria-label="breadcrumb" class="breadcrumb-container w-100 mt-auto pb-3">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('page.inicio') }}">Inicio</a></li>
                        @if($categoria)
                        <li class="breadcrumb-item"><a href="{{ route('page.subcategorias', $categoria->id) }}">{{$categoria->nombre}}</a></li>
                        @endif
                        <li class="breadcrumb-item active" aria-current="page">{{$producto->nombre}}</li>
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
    
              <div class="col-md-6">
            
                <div class="fotorama "
                data-transition="slide"
                data-clicktransition="crossfade"
                data-fit="cover"
                data-keyboard="true"
                data-nav="thumbs"
                data-arrows="true"
                data-click="true" 
               
                data-height="500"
                data-width="100%"
                data-thumbmargin="20"
                data-thumbwidth="100"
                data-thumbheight="75"
                data-loop="true">
                
                  <?php $imagenes = explode(',', $producto->galeria); ?>
                
                
                  @foreach($imagenes as $imagen)
                  @if(isset($imagen))
                  <img src="{{asset(Storage::url($imagen))}}" class="" style="width:500px; ">
                  @else
                  <img src="{{asset('img/logo.jpg')}}" class="" style="width:200px; ">
                  @endif
                  @endforeach
                
                
                
                
                
                </div>
              
              </div>
              <div class="col-md-6">
                <div class="d-flex flex-column h-100 justify-content-between">
                  
                  
                  <div class="">
                       <span class="producto__titulo"> {{$producto->nombre}}</span>
                    
                          
                          @if(isset($producto->descripcion))
                              <div class=" my-3 producto__descripcion" style="" >
                                  {!!$producto->descripcion!!}
                              </div>
                          @endif
                       </div>

                  <div class="product-actions mt-4">
                      <div class="row g-2">
                          <div class="col-md-4">
                              <a href="{{route('page.contacto')}}" class="contenido__btn">
                                  <button type="button" class="btn btn-consulta w-100">
                                      <i class="fas fa-envelope me-1"></i> Consultar
                                  </button>
                              </a>
                          </div>
                          
                          @if(isset($producto->fichatecnica) && !empty($producto->fichatecnica))
                          <div class="col-md-4">
                              <a href="{{asset(Storage::url($producto->fichatecnica))}}" download="" class="contenido__btn">
                                  <button type="button" class="btn btn-ficha w-100">
                                      <i class="fas fa-file-download me-1"></i> Ficha técnica
                                  </button>
                              </a>
                          </div>
                          @endif
                          
                          @if(isset($producto->hojaseguridad) && !empty($producto->hojaseguridad))
                          <div class="col-md-4">
                              <a href="{{asset(Storage::url($producto->hojaseguridad))}}" download="" class="contenido__btn">
                                  <button type="button" class="btn btn-ficha w-100">
                                      <i class="fas fa-shield-alt me-1"></i> Hoja de seguridad
                                  </button>
                              </a>
                          </div>
                          @endif
                      </div>
                  </div>
                </div>
                
                
              </div>
              
          </div>
        </div>
        <div class="mt-4">
          <h2 class="categorias__titulo mb-3">Características</h2>
          @if(isset($producto->caracteristica))
                <div class="my-3 tabla-responsive">
                  {!! str_replace('<table', '<table class="tabla-caracteristicas"', $producto->caracteristica) !!}
                </div>
          @endif
        </div>

        <div class="row mt-4">
          <h2 class="categorias__titulo mb-4">Productos relacionados</h2>
          @if($producto->productorelacion()->count() > 0)
            @foreach($producto->productorelacion()->get() as $p) 
              @if($p->productorelacion())
                <div class="col-6 col-lg-3 col-md-3 mt-2" data-aos="fade-up" data-aos-duration="1000">
                  <a href="{{ route('page.producto', $p->productorelacion()->id) }}" class="producto d-flex flex-column align-items-center text-decoration-none">
                      <div class="prodwrap overflow-hidden position-relative">
                          <div class="img-container" style="background-image: url('{{ isset($p->productorelacion()->imagen) ? asset(Storage::url($p->productorelacion()->imagen)) : asset('img/logo.jpg') }}');">
                          </div>
                          <div class="imgoverlay d-flex justify-content-center align-items-center">
                              <i class="fas fa-plus fa-lg"></i>
                          </div>
                      </div>
                      <div class="text-center mt-3">
                          <span class="productos__titulo">{!! $p->productorelacion()->nombre !!}</span>
                      </div>
                  </a>
                </div>
              @endif
            @endforeach
          @else
            <div class="col-12">
              <p>No hay productos relacionados disponibles.</p>
            </div>
          @endif
        </div>
  </div>
</div>

@endsection


