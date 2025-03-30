@extends('layouts.plantilla')

@section('title', 'Empresa')



@section('content')


<div id="carouselExampleIndicators" class="carousel slide " data-bs-ride="carousel">
    <ol class="carousel-indicators ">

     @for ($i = 0; $i < count($sliders); $i++)

         <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$i}}" style="color:#757376;" class="{{($i == 0) ? 'active': ''}}" aria-current="true" aria-label="Slide 1"></button>

     @endfor

 </ol>
 <div class="carousel-inner ">
     @foreach ($sliders as $slider)
         @if($loop->first)
             <div class="carousel-item active" data-bs-interval="3000">
                 <div class="row " style=" 
                 background-image:url('{{asset(Storage::url($slider->imagen))}}');
                 background-size:cover;
                 background-repeat:no-repeat;
                 height:400px;
                 background-position:center;
                 ">
                     

                            <div class="slider__content">
                                    <div class="container ">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="carousel__titulo" style="" data-aos="fade-right" data-aos-duration="2000">{!!$slider->titulo!!}</div>
                                                <div class="carousel__descripcion" style="" data-aos="fade-right" data-aos-duration="2000">{!!$slider->descripcion!!}</div>

                                            </div>
                                        </div>
                                </div>
                            </div>
                        
                  
                 </div>

             </div>
         @else 
             <div class="carousel-item" data-bs-interval="3000">
                 <div class="row" style=" 
                 background-image:url('{{asset(Storage::url($slider->imagen))}}');
                 background-size:cover;
                 background-repeat:no-repeat;
                 height:400px;
                 background-position:center;
                 ">
                        <div class="slider__content">
                                <div class="container ">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="carousel__titulo" style="" data-aos="fade-right" data-aos-duration="2000">{!!$slider->titulo!!}</div>
                                            <div class="carousel__descripcion" style="" data-aos="fade-right" data-aos-duration="2000">{!!$slider->descripcion!!}</div>

                                        </div>
                                    </div>
                            </div>
                        </div>
                        
                 </div>
             </div>
         @endif
     @endforeach 
 </div>
</div>






<div class="container  my-5">
    
	<div class="row d-flex justify-content-center ">
        <div class="col-md-6">
            <img src="{{asset(Storage::url($empresa->imagen))}}" data-aos="fade-right" data-aos-duration="2000" class="img-thumbnail w-100  border-0">
        </div>			
		<div class="col-md-6 mt-5 ps-3">
            
            <span class=" titulo__contenido">{!!$empresa->titulo!!}</span>
			<div style="" class="empresa__descripcion mt-3 " data-aos="fade-left" data-aos-duration="2000">{!!$empresa->descripcion!!}</div>
		</div>
	</div>	
</div>



<div class="container">
        <div class="bg__rojo">
        <div class="row py-4">
            <div class="bg__titulodos">
                {!!$empresa->titulodos!!}

            </div>
        </div>
    </div>
</div>


<div class="container  my-5">
    
	<div class="row d-flex justify-content-center ">
        <div class="col-md-6">
            <img src="{{asset(Storage::url($empresa->imagendos))}}" data-aos="fade-right" data-aos-duration="2000" class="img-thumbnail w-100  border-0">
        </div>			
		<div class="col-md-6 mt-5 ps-3">
            
            <span class=" titulo__contenido">{!!$empresa->nombre!!}</span>
			<div style="" class="empresa__descripcion mt-3 " data-aos="fade-left" data-aos-duration="2000">{!!$empresa->descripciondos!!}</div>
		</div>
	</div>	
</div>


<div class="" style="background-color: #F5F5F5">

    
    <div class="container py-5">
        <div class="row">
            
                <div class="col-md-4 mb-3">
                    <div class="bg-empresa" data-aos="flip-left" data-aos-duration="2000">
    
                        <div class="d-flex flex-column justify-content-start align-items-start p-5" style="">
                            <img src="{{asset(Storage::url($empresa->icono))}}" alt="" style="height:auto;">
                            <span class="bg__titulo my-3">Misión</span>
                            <div class="bg__descripcion">{!!$empresa->texto!!}</div>
                        </div>     
                    </div>
                    
                </div>
                <div class="col-md-4 mb-3">
                    <div class="bg-empresa" data-aos="flip-up" data-aos-duration="2000">
    
                        <div class="d-flex flex-column justify-content-start align-items-start p-5"  style="">
                            <img src="{{asset(Storage::url($empresa->iconodos))}}" alt="" style="height:auto;">
                            <span class="bg__titulo my-3">Visión</span>
                            <div class="bg__descripcion">{!!$empresa->textodos!!}</div>
                        </div>     
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="bg-empresa"  data-aos="flip-right" data-aos-duration="2000"> 
    
                        <div class="d-flex flex-column justify-content-start align-items-start p-5" style="">
                            <img src="{{asset(Storage::url($empresa->iconotres))}}" alt="" style="height:auto;">
                            <span class="bg__titulo my-3">Valores</span>
                            <div class="bg__descripcion">{!!$empresa->textotres!!}</div>
                        </div>     
                    </div>
                </div>



             
            
        </div>
    </div>
</div>





@endsection