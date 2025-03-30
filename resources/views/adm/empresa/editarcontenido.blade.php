@extends('adm.layouts')

@section('content')
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif


<form method="post" action="{{route('updateempresa',$contenido->id)}}" enctype="multipart/form-data">
	@csrf
	@method('put')
  <div class="form-group">
    <label for="titulo">titulo</label>
    <input type="text" class="form-control" id="titulo" name="titulo" value="{{$contenido->titulo}}">
  </div>
  <div class="form-group">
    <label for="descripcion">Contenido</label>
    <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="10" value="" >{{$contenido->descripcion}}</textarea>
    
  </div>
  <div class="form-group">
    <label for="imagen">Imagen (tamaño 671 × 580 px)</label>
    <input type="file" class="form-control-file" id="imagen" name="imagen" value="">
    <img src="{{asset(Storage::url($contenido->imagen))}}" class="img-thumbnail w-25 mt-4 ">
  </div>

<hr>

<div class="form-group">
  <label for="titulodos">Contenido</label>
  <textarea class="form-control" name="titulodos" id="titulodos" cols="30" rows="10" value="" >{{$contenido->titulodos}}</textarea>
  
</div>

<hr>

<div class="form-group">
  <label for="nombre">nombre</label>
  <input type="text" class="form-control" id="nombre" name="nombre" value="{{$contenido->nombre}}">
</div>
<div class="form-group">
  <label for="descripciondos">Contenido</label>
  <textarea class="form-control" name="descripciondos" id="descripciondos" cols="30" rows="10" value="" >{{$contenido->descripciondos}}</textarea>
  
</div>
<div class="form-group">
  <label for="imagendos">Imagendos (tamaño 671 × 580 px)</label>
  <input type="file" class="form-control-file" id="imagendos" name="imagendos" value="">
  <img src="{{asset(Storage::url($contenido->imagendos))}}" class="img-thumbnail w-25 mt-4 ">
</div>

<hr>

 

  <div class="row">
    <div class="form-group">
      <label for="icono">Icono tamaño 66 × 67 px</label>
      <input type="file" class="form-control-file" id="icono" name="icono" value="">
      <img src="{{asset(Storage::url($contenido->icono))}}" class="img-thumbnail w-25 mt-4 ">
    </div>
    <div class="form-group">
      <label for="iconodos">Icono Dos tamaño 66 × 67 px</label>
      <input type="file" class="form-control-file" id="iconodos" name="iconodos" value="">
      <img src="{{asset(Storage::url($contenido->iconodos))}}" class="img-thumbnail w-25 mt-4 ">
    </div>
    <div class="form-group">
      <label for="iconotres">Icono Tres tamaño 66 × 67 px</label>
      <input type="file" class="form-control-file" id="iconotres" name="iconotres" value="">
      <img src="{{asset(Storage::url($contenido->iconotres))}}" class="img-thumbnail w-25 mt-4 ">
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-4">
      <label for="texto">Mision</label>
      <textarea class="form-control" name="texto" id="texto" cols="30" rows="10" value="" >{{$contenido->texto}}</textarea>
      
    </div>
    <div class="form-group col-md-4">
      <label for="texto">Visión</label>
      <textarea class="form-control" name="textodos" id="textodos" cols="30" rows="10" value="" >{{$contenido->textodos}}</textarea>
      
    </div>
    <div class="form-group col-md-4">
      <label for="calidad">Valores</label>
      <textarea class="form-control" name="textotres" id="textotres" cols="30" rows="10" value="" >{{$contenido->textotres}}</textarea>
      
    </div>
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