@extends('adm.layouts')

<script src="{{asset('js/producto.js')}}"></script>
@section('content')



<form method="post" action="{{route('updateproductos',$productos->id)}}" enctype="multipart/form-data">
	@csrf
  @method('put')
  <div class="row">
    <div class="form-group col-md-6">
      <label for="orden">orden</label>
      <input type="text" class="form-control" id="orden" name="orden" value="{{$productos->orden}}">
      
    </div>
    <div class="form-group col-md-6">
      <label for="nombre">Nombre</label>
      <input type="text" class="form-control" id="nombre" name="nombre" value="{{$productos->nombre}}">
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-6">
      <label for="categoria_id">Seleccione Categoria</label>
        <select name="categoria_id" id="categoria_id" class="form-control" >
          @foreach($categorias as $c)
            <option value="{{$c->id}}"  @if($c->id== $productos->categoria_id) selected @endif>{{$c->nombre}}</option>
          @endforeach
        </select>
    </div>
    <div class="form-group col-md-6">
      <label for="subcategoria_id">Seleccione subCategoria</label>
        <select name="subcategoria_id" id="subcategoria_id" class="form-control" >
          @foreach($subcategorias as $c)
            <option value="{{$c->id}}"  @if($c->id== $productos->subcategoria_id) selected @endif>{{$c->nombre}}</option>
          @endforeach
        </select>
    </div>

  </div>

  <div class="row">

    
  

    <div class=" form-group col-md-6">
      <label for="categoria_id">Seleccione productos relacionados</label>

      <?php
        
        $prods = \App\Models\Productos::all();
     

        ?>
            <?php
            $selecteds = $productos->productorelacion()->pluck('relacion_id')->toArray();
    
          ?>
          {{-- @dd($selecteds) --}}
          {{-- @dd($productos->productorelacion()->get()) --}}
        <select class="js-example-basic-multiple w-100" name="productos[]" multiple="multiple">

          @foreach($prods as $c)

                <option value="{{$c->id}}" 
                  @if(in_array($c->id, $selecteds ))
                  selected
                @endif
                  >
                {{$c->nombre}}
                  </option>
              @endforeach
        </select>
  </div>
    

  
  </div>
  
  
    
 

      <div class="form-group ">
        <label for="descripcion">Descripcion</label>
        <textarea class="form-control" name="descripcion"  id="descripcion" cols="30" rows="10" value="">{!!$productos->descripcion!!}</textarea>
      </div>
      <div class="form-group ">
        <label for="caracteristica">caracteristica</label>
        <textarea class="form-control" name="caracteristica"  id="caracteristica" cols="30" rows="10" value="">{!!$productos->caracteristica!!}</textarea>
      </div>
      




  <div class="row">
    



    
    <div class="form-group col-md-6">
      <label for="imagen">Imagen</label>
      <input type="file" class="form-control-file" id="imagen" name="imagen">
      <strong>{{$productos->pdf}}</strong>
      <img src="{{asset(Storage::url($productos->imagen))}}" class="img-thumbnail mt-4">
    </div>
    <div class="form-group col-md-6">
      <label for="pdf">pdf</label>
      <input type="file" class="form-control-file" id="pdf" name="pdf">
      @if($productos->pdf)
        <div class="d-flex align-items-center mt-2">
          <strong>{{$productos->pdf}}</strong>
          <a href="{{ route('eliminar.documento', [$productos->id, 'pdf']) }}" class="btn btn-sm btn-danger ml-2" onclick="return confirm('¿Está seguro de eliminar este documento?')">
            <i class="fas fa-trash"></i>
          </a>
        </div>
      @endif
    </div>
    <div class="form-group col-md-6">
      <label for="pdf">Ficha T&eacute;cnica</label>
      <input type="file" class="form-control-file" name="fichatecnica">
      @if($productos->fichatecnica)
        <div class="d-flex align-items-center mt-2">
          <strong>{{$productos->fichatecnica}}</strong>
          <a href="{{ route('eliminar.documento', [$productos->id, 'fichatecnica']) }}" class="btn btn-sm btn-danger ml-2" onclick="return confirm('¿Está seguro de eliminar este documento?')">
            <i class="fas fa-trash"></i>
          </a>
        </div>
      @endif
    </div>      
    <div class="form-group col-md-6">
      <label for="pdf">Hoja de seguridad</label>
      <input type="file" class="form-control-file" name="hojaseguridad">
      @if($productos->hojaseguridad)
        <div class="d-flex align-items-center mt-2">
          <strong>{{$productos->hojaseguridad}}</strong>
          <a href="{{ route('eliminar.documento', [$productos->id, 'hojaseguridad']) }}" class="btn btn-sm btn-danger ml-2" onclick="return confirm('¿Está seguro de eliminar este documento?')">
            <i class="fas fa-trash"></i>
          </a>
        </div>
      @endif
    </div>
  </div>

  
  <div class="form-group col-md-6">
    <label for="galeria">galeria</label>
    <input type="file" class="form-control-file" id="galeria" name="galeria[]" value="" multiple="">
    <?php $galerias = explode(',', $productos->galeria); ?>
    <div class="d-flex my-3">
      @foreach($galerias as $key => $galeria)
        <div>
          <a  href="{{route('borrarproducto',[$productos->id, $key])}}" class="btn btn-danger" style="  position: absolute; text-align: center;" > <i class="fas fa-times " style="color: white;"></i> </a>
          <img src="{{asset(Storage::url($galeria))}}" class="border" style="width:200px;  margin-right: 13px;">
        </div>
      @endforeach
    </div>
  </div>



<div class="row">

  <div class="d-flex flex-column col-md-6">   
    <span>Productos destacados</span>
    <div class="form-check form-check-inline">
      <label class="form-check-label mr-3" for="inlineCheckbox1">Si</label>
      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="destacado" @if($productos->destacado == 1) checked="" @endif>
    </div>
    
</div>
  <div class="d-flex flex-column col-md-6">   
    <span> alimenticia</span>
    <div class="form-check form-check-inline">
      <label class="form-check-label mr-3" for="inlineCheckbox1">Si</label>
      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="alimenticia" @if($productos->alimenticia == 1) checked="" @endif>
    </div>
    
</div>
  <div class="d-flex flex-column col-md-6">   
    <span> farmaceuticas</span>
    <div class="form-check form-check-inline">
      <label class="form-check-label mr-3" for="inlineCheckbox1">Si</label>
      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="farmaceuticas" @if($productos->farmaceuticas == 1) checked="" @endif>
    </div>
    
</div>
  <div class="d-flex flex-column col-md-6">   
    <span> petrolera</span>
    <div class="form-check form-check-inline">
      <label class="form-check-label mr-3" for="inlineCheckbox1">Si</label>
      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="petrolera" @if($productos->petrolera == 1) checked="" @endif>
    </div>
    
</div>

  <div class="d-flex flex-column col-md-6">   
    <span> panificadora</span>
    <div class="form-check form-check-inline">
      <label class="form-check-label mr-3" for="inlineCheckbox1">Si</label>
      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="panificadora" @if($productos->panificadora == 1) checked="" @endif>
    </div>
    
</div>
  <div class="d-flex flex-column col-md-6">   
    <span> bebidas</span>
    <div class="form-check form-check-inline">
      <label class="form-check-label mr-3" for="inlineCheckbox1">Si</label>
      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="bebidas" @if($productos->bebidas == 1) checked="" @endif>
    </div>
    
</div>
  <div class="d-flex flex-column col-md-6">   
    <span> metal</span>
    <div class="form-check form-check-inline">
      <label class="form-check-label mr-3" for="inlineCheckbox1">Si</label>
      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="metal" @if($productos->metal == 1) checked="" @endif>
    </div>
    
</div>
</div>


  
  
  
 <button type="submit" class="btn btn-success">Editar</button>
</form>



@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

 <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
 <script>
  $(document).ready(function() {

$('textarea').summernote({

   
 placeholder: 'Hello stand alone ui',
 tabsize: 2,
 height: 420,
 fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
 toolbar: [
 ['style', ['bold', 'italic', 'underline', 'clear']],
 ['font', ['bold', 'underline', 'clear']],
 ['fontsize', ['fontsize']],
 ['color', ['color']],
 ['para', ['ul', 'ol', 'paragraph']],
 ['table', ['table']],
 ['insert', ['link', 'picture', 'video']],
 
 ['view', ['fullscreen', 'codeview', 'help']]
],


   

});
$('.js-example-basic-multiple').select2({
          
        });

});

</script> 



@endsection