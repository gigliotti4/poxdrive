@extends('adm.layouts')
<script src="{{asset('js/producto.js')}}"></script>

@section('content')

<form method="post" action="{{route('crearproductos')}}" enctype="multipart/form-data">
	@csrf
  <div class="row">
    <div class="form-group col-md-6">
      <label for="orden">orden as</label>
      <input type="text" class="form-control" id="orden" name="orden" >
      
    </div>
    <div class="form-group col-md-6">
      <label for="nombre">Nombre</label>
      <input type="text" class="form-control" id="nombre" name="nombre">
    </div>
  </div>

  <div class="form-group col-md-6">
    <label for="categoria_id">Seleccione Categoria</label>
      <select name="categoria_id" id="categoria_id" class="form-control" >
        @foreach($categorias as $c)
          <option value="{{$c->id}}">{{$c->nombre}}</option>
        @endforeach
      </select>
  </div>


  <div class="row">


    <div class="form-group col-md-6">
      <label for="subcategoria_id">Seleccione subCategoria</label>
        <select name="subcategoria_id" id="subcategoria_id" class="form-control" >
          @foreach($subcategorias as $c)
            <option value="{{$c->id}}">{{$c->nombre}}</option>
          @endforeach
        </select>
    </div>



      <?php
  
       $productos = \App\Models\Productos::all();
  
       ?>
   
      <div class=" form-group col-md-6">
       <label for="">Seleccione productos Relacionados</label>
     <select class="js-example-basic-multiple w-100" name="productos[]" multiple="true">
       @foreach($productos as $c)
             <option value="{{$c->id}}" >
               {{$c->nombre}}
               </option>
           @endforeach
     </select>
 
  
  
    
   </div> 

 
  </div>
  


  <div class="form-group ">
    <label for="descripcion">Descripcion</label>
    <textarea class="form-control" name="descripcion"  id="descripcion" cols="30" rows="10" value=""></textarea>
  </div>
  
  <div class="form-group ">
    <label for="caracteristica">Caracteristica</label>
    <textarea class="form-control" name="caracteristica"  id="caracteristica" cols="30" rows="10" value=""></textarea>
  </div>
  <div class="row">
      

    <div class="form-group col-md-6">
      <label for="imagen">Imagen  (Tamaño recomendado: 1080X1080 px)</label>
      <input type="file" class="form-control-file" id="imagen" name="imagen">
      
    </div>


      <div class="form-group col-md-6">
        <label for="pdf">pdf</label>
        <input type="file" class="form-control-file" id="pdf" name="pdf">
        
      </div>

    <div class="form-group col-md-6">
        <label for="pdf">Ficha T&eacute;cnica</label>
        <input type="file" class="form-control-file" name="fichatecnica">
        
      </div>      
      <div class="form-group col-md-6">
        <label for="pdf">Hoja de seguridad</label>
        <input type="file" class="form-control-file" name="hojaseguridad">
        
      </div>

  </div>

  <div class="row">
    <div class="form-group col-md-6">
      <label for="galeria">Galeria (Tamaño recomendado: 1080X1080 px)</label>
      <input type="file" class="form-control-file" id="galeria" name="galeria[]" multiple="">
      
    </div>
  </div>


<div class="row">

  <div class="d-flex flex-column col-md-6">   
    <span>Producto destacado</span>
    <div class="form-check form-check-inline">
      <label class="form-check-label mr-3" for="inlineCheckbox1">Si</label>
      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="destacado" >
  </div>
</div>
  <div class="d-flex flex-column col-md-6">   
    <span>panificadora</span>
    <div class="form-check form-check-inline">
      <label class="form-check-label mr-3" for="inlineCheckbox1">Si</label>
      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="panificadora" >
  </div>
</div>
  <div class="d-flex flex-column col-md-6">   
    <span>alimenticia</span>
    <div class="form-check form-check-inline">
      <label class="form-check-label mr-3" for="inlineCheckbox1">Si</label>
      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="alimenticia" >
  </div>
</div>
  <div class="d-flex flex-column col-md-6">   
    <span> bebidas</span>
    <div class="form-check form-check-inline">
      <label class="form-check-label mr-3" for="inlineCheckbox1">Si</label>
      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="bebidas" >
  </div>
</div>
  <div class="d-flex flex-column col-md-6">   
    <span> farmaceuticas</span>
    <div class="form-check form-check-inline">
      <label class="form-check-label mr-3" for="inlineCheckbox1">Si</label>
      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="farmaceuticas" >
  </div>
</div>
  <div class="d-flex flex-column col-md-6">   
    <span> metal</span>
    <div class="form-check form-check-inline">
      <label class="form-check-label mr-3" for="inlineCheckbox1">Si</label>
      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="metal" >
  </div>
</div>
  <div class="d-flex flex-column col-md-6">   
    <span> petrolera</span>
    <div class="form-check form-check-inline">
      <label class="form-check-label mr-3" for="inlineCheckbox1">Si</label>
      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="petrolera" >
  </div>
</div>
</div>





 

  
 <button type="submit" class="btn btn-success">Agregar</button>
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