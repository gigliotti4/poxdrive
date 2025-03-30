@extends('layouts.plantilla')



<style>
     .fondodelcoso{
        background-color: #F58634 !important;
        line-height: 40px;
    }

    <style>
    .image{
   display: block;
   
   }


</style>
@section('content')
<div class="fondodelcoso">
    <div class="container">
        <div class="col-md-12">
            <div class="">
                <span class="mt-1" style="font-size: 16px; color:white;">Clientes</span>
            </div>
        </div>
    </div>
</div>
<div style="background-color: #F6F6F6;">

        <div class="container py-5">          
            <div class="row clientes ">
                @foreach($clientes as $c)
        
                <div class="col-md-3 mt-3 mb-3 d-flex justify-content-center">
                    <div class="border bg-white " style="background-image: url({{asset(Storage::url($c->imagen))}});
                        height:160px;
                        width:80%;
                        background-repeat:no-repeat;
                        background-position:center;">
                        
                    </div>
                    {{-- <div class="card">
                                    
                        <img src="{{asset(Storage::url($c->imagen))}}" class="img-fluid w-25 image" alt="...">
                        
                    </div> --}}
                </div>    
                @endforeach
            </div>
            
        </div>
</div>








@endsection

@section('js')

<script type="text/javascript">
   
$('.aplicaciones').slick({
 dots: true,
 infinite: false,
 speed: 300,
 slidesToShow: 4,
 slidesToScroll: 4,
 responsive: [
   {
     breakpoint: 1024,
     settings: {
       slidesToShow: 3,
       slidesToScroll: 3,
       infinite: true,
       dots: true
     }
   },
   {
     breakpoint: 600,
     settings: {
       slidesToShow: 2,
       slidesToScroll: 2
     }
   },
   {
     breakpoint: 480,
     settings: {
       slidesToShow: 1,
       slidesToScroll: 1
     }
   }
   // You can unslick at a given breakpoint now by adding:
   // settings: "unslick"
   // instead of a settings object
 ]
});
</script>
@endsection