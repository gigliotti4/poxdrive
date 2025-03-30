@extends('adm.layouts')

@section('content')
<h3>Nuevo Slider</h3>
<form method="post" action="{{route('crearslider', $seccion)}}" enctype="multipart/form-data">
	@csrf
  <div class="form-group col-md-6">
    <label for="orden">orden</label>
    <input type="text" class="form-control" id="orden" name="orden" >
    
  </div>
  
  <div class="form-group col-md-6">
    <label for="titulo">Titulo</label>
    <input type="text" class="form-control" id="titulo" name="titulo">
  </div> 
  <div class="form-group col-md-8">
    <label for="descripcion">Contenido</label>
    <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="10" value="" ></textarea>
    
  </div> 
  <div class="form-group col-md-6">
    <label for="imagen">Imagen</label>
    <input type="file" class="form-control-file" required id="imagen" name="imagen">
    <span class="">Seleccione (Tamaño recomendado: 1400x480px)</span>
  </div>



 <button type="submit" class="btn btn-success">Agregar</button>
</form>
@endsection
 @section('js')
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
         });
    
</script> 

@endsection