@extends('layouts.plantilla')
@section('title', $novedad->titulo)
@section('content')
    <!--Barra Azul-->
    <div class="cabecera__contenedor "> 
        <div class="container">   
               <div class="col-md-12">     
                   <div class="d-flex  py-2">
                       <span class="cabecera__miga" style=""><a href="{{route('page.inicio')}}" class="cabecera__miga"> Inicio </a>| Novedades</span> 
                       
                    </div>          
    
                </div>
            </div>
    </div>

    <div class="container my-4">
        <div class="row ">
            <div class="col-md-6">
                <div class="mb-3 border-0" style="overflow: hidden;">
                    <p class="m-0 novedad__categoria__final">{{$novedad->categoria->titulo}}</p>
                    <div class="novedad__titulo__final mt-3" style="">{{$novedad->titulo}}</div>
                  
                    <div class=" mt-4" style=";">
                        
                        
                         
                         <div class="novedad__texto__final">{!!$novedad->texto!!}</div>
                        
                    </div>
                </div>
            </div>
            <div class="col-md 6">
                <img src="{{asset('images/novedades/'.$novedad->imagen)}}" class="w-100" alt="..." height="">
            </div>
           
        </div>
    </div>
@endsection