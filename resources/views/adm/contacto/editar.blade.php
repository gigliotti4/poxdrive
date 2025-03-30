@extends('adm.layouts')

@section('content')
<form method="post" action="{{route('updatecontacto',$contacto->id)}}" enctype="multipart/form-data">
	@csrf
  @method('put')


  <div class="form-group col-md-12">
    <label for="mapa">Mapa</label>
    <textarea class="form-control" name="mapa"  id="mapa" cols="30" rows="10" value="" >{!!$contacto->mapa!!}</textarea>
  </div>

    <div class="form-group">
    <label for="enlace">enlace </label>
    <input type="text" class="form-control" id="enlace" name="enlace" value="{{$contacto->enlace}}">
  </div>
  <div class="form-group">
    <label for="direccion">Direccion </label>
    <input type="text" class="form-control" id="direccion" name="direccion" value="{{$contacto->direccion}}">
  </div>
  <div class="form-group">
    <label for="whatsapp">Whatsapp (+549) </label>
    <input type="tel" class="form-control" id="whatsapp" name="whatsapp" value="{{$contacto->whatsapp}}">
  </div>
   <div class="form-group">
    <label for="telefono"> Celular</label>
    <input type="tel" class="form-control" id="telefono" name="telefono" value="{{$contacto->telefono}}">
  </div>
 
   <div class="form-group">
    <label for="correo">Correo </label>
    <input type="email" class="form-control" id="correo" name="correo" value="{{$contacto->correo}}">
  </div>
  <div class="form-group">
    <label for="horario">horario </label>
    <input type="text" class="form-control" id="horario" name="horario" value="{{$contacto->horario}}">
  </div>
  <div class="form-group">
    <label for="retiro">retiro </label>
    <input type="text" class="form-control" id="retiro" name="retiro" value="{{$contacto->retiro}}">
  </div>
 <button type="submit" class="btn btn-success">Editar</button>
</form>


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
@endsection