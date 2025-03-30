@extends('adm.layouts')



@section('content')

@if(session()->has('success'))

    <div class="alert alert-success">

        {{ session()->get('success') }}

    </div>

@endif





<form method="post" action="{{route('updateinicio',$contenido->id)}}" enctype="multipart/form-data">

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

    <label for="imagen">Imagen ((tamaño 671 × 580 px))</label>

    <input type="file" class="form-control-file" id="imagen" name="imagen" value="">

    <img src="{{asset(Storage::url($contenido->imagen))}}" class="img-thumbnail w-25 mt-4 ">

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