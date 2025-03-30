@extends('layouts.plantilla')

@section('title', 'Carta de colores')

@section('content')

<div class="cabecera__contenedor border-top"> 
    <div class="container">   
        <div class="row">     
            <div class="d-flex align-items-start flex-column bg__cabecera">
                <nav aria-label="breadcrumb" class="breadcrumb-container w-100 mt-auto pb-3">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('page.inicio') }}">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Carta de colores</li>
                    </ol>
                </nav>
            </div>          
        </div>
    </div>
</div>


<div class="container my-5">
    <div class="row justify-content-start">
            
            @foreach($colores as $c)
            <div class="caja border  mx-2 mb-3 "style="background-color:{{$c->colores}}; height:215px; width:182px; "> 
                   <div class="overlay">
                       <div class="text">
                        
                        {{$c->nombre}}
                       </div>
                    
                   </div>
            </div> 
            @endforeach   
              
    </div>
</div>



@endsection