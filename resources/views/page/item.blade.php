@extends('layouts.plantilla')

@section('title', $item->nombre)

@section('content')

<div class="cabecera__contenedor border-top"> 
    <div class="container">   
           <div class="row">     
               <div class="d-flex align-items-start flex-column bg__cabecera">
                   <span class="mt-auto pb-4 cabecera__miga" style="">Inicio > Herarramientas</span> 
                   
                </div>          

            </div>
        </div>
</div>


<div class="container my-5">
    <div class="row">
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
    <div class="col-md-9">
        <div class="row">

          <div class="col-md-6">
        
            <div class="fotorama "
            data-nav="thumbs"
            data-arrows="true"
            data-click="true" 
            data-height="310"
            data-width="545"
            data-thumbmargin="20"
            data-thumbwidth="100"
            data-thumbheight="75"
            data-loop="true">
            
              <?php $imagenes = explode(',', $item->galeria); ?>
            
            
              @foreach($imagenes as $imagen)
              <img src="{{asset(Storage::url($imagen))}}" class="img-thumbnail mt-4 mx-2 shadow" style="width:200px; ">
              @endforeach
            
            
            
            
            
            </div>
          
          </div>
          <div class="col-md-6">
            {{-- <span class="producto__categoria"> {{$producto->categoria->nombre}}</span><br> --}}
            <span class="producto__titulo"> {{$item->nombre}}</span>
           
            <div class="my-3">
                <span class="categorias__titulo ">Descripcion</span>
              @if(isset($item->descripcion))
              
                  <div class="flex-grow-1 my-3 producto__descripcion" style="" >
                      {!!$item->descripcion!!}
                  </div>
              @endif
            </div>
       
            
              
        </div>
        </div>
        
</div>










@endsection