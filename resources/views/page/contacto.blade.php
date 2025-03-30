@extends('layouts.plantilla')
@section('title', 'Contacto')
@section('content') 
<div class="cabecera__contenedor border-top"> 
    <div class="container">   
        <div class="row">     
            <div class="d-flex align-items-start flex-column bg__cabecera">
                <nav aria-label="breadcrumb" class="breadcrumb-container w-100 mt-auto pb-3">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('page.inicio') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Contacto</li>
                     
                    </ol>
                </nav>
            </div>          
        </div>
    </div>
</div>

@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i> {{ session()->get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="container py-5">
    <div class="row mb-4">
        <div class="col-12 text-center mb-4">
            <h2 class="contact-heading fw-bold mb-2">Contáctenos</h2>
            <div class="contact-heading-line mx-auto mb-3"></div>
            <p class="contact-subtitle">Estamos aquí para responder cualquier consulta que pueda tener</p>
        </div>
    </div>
    
    <div class="row g-4">
        <div class="col-md-4">
            <div class="contact-info-card h-100 p-4">
                <h3 class="contacto__titulo mb-3">Información de contacto</h3>
                <p class="contacto__descripcion mb-4">
                    Para mayor información, no dude en contactarse mediante el siguiente formulario, o a través de nuestras vías de comunicación.
                </p>
                
                <div class="contact-details">
                    @foreach ($contactos as $contacto)
                    <div class="contact-item mb-3">
                        <div class="d-flex">
                            <div class="contact-icon-wrapper me-3">
                                <i class="iconocom fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <a class="contact-link" href="{{$contacto->enlace}}" target="_blank">
                                    <span class="enlace__contacto">{{$contacto->direccion}}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="contact-item mb-3">
                        <div class="d-flex">
                            <div class="contact-icon-wrapper me-3">
                                <i class="iconocom far fa-envelope"></i>
                            </div>
                            <div>
                                <a class="contact-link" href="mailto:{{$contacto->correo}}">
                                    <span class="enlace__contacto">{{$contacto->correo}}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="contact-item mb-3">
                        <div class="d-flex">
                            <div class="contact-icon-wrapper me-3">
                                <i class="iconocom fab fa-whatsapp"></i>
                            </div>
                            <div>
                                <a class="contact-link" href="https://wa.me/{{$contacto->whatsapp}}">
                                    <span class="enlace__contacto">{{$contacto->whatsapp}}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="d-flex">
                            <div class="contact-icon-wrapper me-3">
                                <i class="iconocom fas fa-phone-alt"></i>
                            </div>
                            <div>
                                <a class="contact-link" href="tel:{{$contacto->telefono}}">
                                    <span class="enlace__contacto">{{$contacto->telefono}}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="contact-form-card p-4">
                <form method="post" action="{{route('enviarmail')}}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                                <label for="nombre" class="formulario">Nombre</label>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" required>
                                <label for="apellido" class="formulario">Apellido</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                <label for="email" class="formulario">Email</label>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Teléfono">
                                <label for="telefono" class="formulario">Teléfono</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" id="mensaje" name="mensaje" placeholder="Escriba un mensaje" style="height: 120px" required></textarea>
                                <label for="mensaje" class="formulario">Escriba un mensaje...</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="captcha-container">
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}
                                @error('g-recaptcha-response')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6 d-flex justify-content-end align-items-center mt-3 mt-md-0">
                            <button type="submit" class="btn btn-consulta ">
                                <i class="far fa-paper-plane me-2"></i>Enviar Consulta
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="row mt-5">
        <div class="col-12">
            <div class="map-container shadow">
              {!!$contacto->mapa!!}
            </div>
        </div>
    </div>
</div>
@endsection