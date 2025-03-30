@extends('layouts.plantilla')

@section('title', 'Galeria')

@section('content')

<style>
    .categorias{
        color: #000;

font-family: 'Roboto';
font-size: 21px;
font-style: normal;
font-weight: 700;
line-height: normal;
    }
</style>


<div class="cabecera__contenedor border-top"> 
    <div class="container">   
        <div class="row">     
            <div class="d-flex align-items-start flex-column bg__cabecera">
                <nav aria-label="breadcrumb" class="breadcrumb-container w-100 mt-auto pb-3">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('page.inicio') }}">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Gal</li>
                    </ol>
                </nav>
            </div>          
        </div>
    </div>
  </div>

<div class="container">
    <div class="row">

        <div class="d-flex ">

                  
            @foreach($categorias as $categoria)
            
            <a class="categorias " style="" href="{{route('page.galeria',$categoria->id)}}">{{$categoria->nombre}}</a>
            <hr>
            @endforeach
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        @foreach($categorias as $image)
        <div class="col-md-4">
            <img src="{{asset(Storage::url($image->image))}}" alt="{{ $image->name }}">
        </div>
        @endforeach
    </div>
</div>











@endsection