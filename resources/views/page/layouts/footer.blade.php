<div class="fondofooterseccion p-5">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        @foreach($logosheader as $l)
                        <img src="{{asset(Storage::url($l->imagen))}}" class="img-fluid my-3" style="width: auto;">
                        @endforeach
                    </div>

                    <!-- Título "Secciones" alineado -->
                    <div class="col-6 col-md-2">
                        <h5 class="footer__titulo mb-3 text-white text-uppercase">Secciones</h5>
                        <div class="d-flex flex-column">	
                            <a href="{{route('page.inicio')}}" class="footer__secciones">Inicio</a><br>
                            <a href="{{route('page.empresa')}}" class="footer__secciones">Empresa</a><br>
                            <a href="{{route('page.categorias')}}" class="footer__secciones">Productos</a><br>
                            <a href="{{route('page.aplicaciones')}}" class="footer__secciones">Usos y aplicaciones</a><br>
                            <a href="{{route('page.colores')}}" class="footer__secciones">Carta de colores</a><br>
                            
                        </div>		
                    </div>
                    <div class="col-6 col-md-2 mt-5">
                        <div class="d-flex flex-column">
                            <a href="{{route('page.familias')}}" class="footer__secciones">Herramientas</a><br>
                        <a href="{{route('page.usos')}}" class="footer__secciones">Instructivos de uso</a><br>
                            <a href="{{route('page.distribuidores')}}" class="footer__secciones">Distribuidores</a><br>
                            <a href="{{route('page.novedades')}}" class="footer__secciones">Galeria</a><br>
                        
                            {{-- <a href="#" class="footer__secciones">Novedades</a><br> --}}
                            <a href="{{route('page.contacto')}}" class="footer__secciones">Contacto</a><br>
                        </div>	
                    </div>

                    <!-- Título "Datos de contacto" alineado -->
                    <div class="col-md-4">
                        <h5 class="footer__titulo mb-3 text-white text-uppercase">Datos de contacto</h5>
                        @foreach ($contactos as $c)
                        <div class="d-flex mt-3">
                            <i class="fas fa-map-marker-alt fa-lg" style="color: #fff;"></i>
                            <a href="{{$c->enlace}}" target="_blank" class="footer__secciones ms-3">{{$c->direccion}}</a>
                        </div>
                        <div class="d-flex my-3">
                            <i class="fab fa-whatsapp fa-lg" style="color: #fff;"></i>
                            <a href="https://wa.me/{{$c->whatsapp}}" target="_blank" class="footer__secciones ms-3">{{$c->whatsapp}}</a>
                        </div>
                        <div class="d-flex my-3">
                            <i class="fas fa-phone-alt" style="color: #fff;"></i>
                            <a href="tel:{{$c->telefono}}" class="footer__secciones ms-3">{{$c->telefono}}</a>
                        </div>
                        <div class="d-flex mt-3">
                            <i class="fas fa-envelope fa-lg" style="color:#fff;"></i>
                            <a href="mailto:{{$c->correo}}" class="footer__secciones ms-3">{{$c->correo}}</a>
                        </div>
                        <div class="d-flex mt-3">
                            <i class="far fa-clock fa-lg" style="color: #fff;"></i>
                            <a href="#" target="_blank" class="footer__secciones ms-3">{{$c->horario}}</a>
                        </div>
                        <div class="d-flex mt-3 ms-4">
                            <a href="#" target="_blank" class="footer__secciones ms-3">{{$c->retiro}}</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div> 			
    </div>
</div>



@section('js')
    
<script>
    $('#formSubscribirse').on('submit', function(e) {
        e.preventDefault();
        let form = new FormData($('#formSubscribirse')[0]);
        $.ajax({
            type: "post",
            url: "{{ route('subscribirse') }}",
            data: form,
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                swal("Se ha suscripto correctamente", "", "success");
                $('#formSubscribirse')[0].reset();
                setTimeout(function() { location.reload(); }, 1500);
            },
            error: function(response) {
                console.log(response);
                swal("Algo salió mal", "", "error");
            }
        });
    });
</script>
  
@endsection