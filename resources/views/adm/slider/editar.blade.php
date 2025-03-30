@extends('adm.layouts')

@section('content')

<form method="post" action="{{route('updateslider',[$seccion,'id'=>$slider->id])}}" enctype="multipart/form-data">
	@csrf
  @method('put')
  <div class="form-group col-md-6">
    <label for="orden">orden</label>
    <input type="text" class="form-control" id="orden" name="orden" value="{{$slider->orden}}">   
  </div>

  <div class="form-group col-md-6">
    <label for="titulo">Titulo</label>
    <input type="text" class="form-control" id="titulo" name="titulo" value="{!!$slider->titulo!!}">
  </div> 
  
  <div class="form-group col-md-8">
    <label for="descripcion">Descripcion</label>
    
    <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="10" value="{{$slider->descripcion}}" >{!!$slider->descripcion!!}</textarea>
  </div>
  <div class="form-group">
    <label for="imagen">Imagen</label>
    <input type="file" class="form-control-file" id="imagen" name="imagen" value="">
    <span class="">Seleccione (Tamaño recomendado: 1400x480px)</span>
    <img src="{{asset(Storage::url($slider->imagen))}}" class="img-thumbnail mt-4">
  </div>
 <button type="submit" class="btn btn-success">Editar</button>
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