@extends('layouts.plantilla')
@section('title', 'Calidad')

@section('content')


<section class="nav-categorias col-12 col-md-3" style="margin-bottom:70px;">

    <div class="accordion" id="accordionExample">
@foreach($familias as $cat)
      <div class="accordion-item" style="border:none;">
        <h2 class="accordion-header" id="heading{{$cat->id}}">
          <button class="accordion-button {{($cat->id == $categoria->familia->id) ? 'collapsed' : ''}} " type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$cat->id}}" aria-expanded="{{($cat->id == $categoria->familia->id) ? 'true' : 'false'}}" aria-controls="collapse{{$cat->id}}">
          <a href="{{route('web.productos.categoria', $cat->primercatid())}}" style="font-family: 'Work Sans';font-style: normal;font-weight: 600;font-size: 20px;line-height: 23px;color: #005CA9; display: flex; align-items: center;justify-content: space-between;  text-transform: capitalize !important;
            "    class="{{ $familia->id == $cat->id ? '' : '' }}"><div>{{$cat->nombre}}</div></a>
          </button>
        </h2>
        <div id="collapse{{$cat->id}}" class="accordion-collapse collapse {{($cat->id == $categoria->familia->id) ? 'show' : ''}}" aria-labelledby="heading{{$cat->id}}" data-bs-parent="#accordionExample">
          <div class="accordion-body" style="    padding: 0 0 0 33;">
                    <div class="accordion" id="accordionExample2{{$cat->id}}">
                            @foreach($categorias as $cat2)
                            @if( $  ->familia->id == $cat->id)
                          <div class="accordion-item" style="border:none;">
                            <h2 class="accordion-header" id="heading2{{$cat2->id}}{{$cat->id}}">
                              <button class="accordion-button {{($cat2->id == $categoria->familia->id) ? 'collapsed' : ''}} " type="button" data-bs-toggle="collapse" data-bs-target="#collapse2{{$cat2->id}}{{$cat->id}}" aria-expanded="{{($cat2->id == $categoria->familia->id) ? 'true' : 'false'}}" aria-controls="collapse2{{$cat2->id}}{{$cat->id}}">
                              <a href="{{route('web.productos.categoria', $cat2->id)}}" style="    font-style: normal;font-weight: 500;font-size: 18px;line-height: 21px;color: rgb(0, 92, 169); text-transform: capitalize !important;     display: flex; align-items: center;justify-content: space-between;
                                        " class="{{ $familia->id == $cat2->id ? '' : '' }}"><div>{{$cat2->nombre}}</div></a>
                              </button>
                            </h2>
                            <div id="collapse2{{$cat2->id}}{{$cat->id}}" class="accordion-collapse collapse {{($cat2->id == $categoria->familia->id) ? 'show' : ''}}" aria-labelledby="heading2{{$cat2->id}}" data-bs-parent="#accordionExample2{{$cat->id}}">
                              <div class="accordion-body" style="padding: 0 0 0 33;">
                                    @foreach ($productos as $producto)
                                        <div class="panel">
                                            <div class="panel-heading">
                                                @if($producto->categoria->id == $cat2->id)
                                                    <p style="display:inline;"> 
                                                        <span href="#panelSubCat{{$producto->id}}" data-bs-target="#panelSubCat{{$producto->id}}" aria-expanded="true" aria-controls="panelSubCat{{$producto->id}}" class="accordion-toggle" aria-expanded="true" data-bs-toggle="collapse" data-parent="#accordion"></span> 
                                                        <a style=" font-style: normal;font-weight: 400;font-size: 16px;line-height: 19px;color: rgb(22, 22, 22);padding: 11px 0px 11px 31px;" href="{{route('web.productos.producto', $producto->id)}}" class="productoActive">    {{ $producto->nombre }}</a> 
                                                    </p>
                                                @endif
                                            </div>
                                            
                                        </div>
                                    @endforeach
                              </div>
                            </div>
                          </div>
                         @endif
                         @endforeach
                    </div>           
          </div>
        </div>
      </div>
      @endforeach
    </div>
                 
</section>
@endsection