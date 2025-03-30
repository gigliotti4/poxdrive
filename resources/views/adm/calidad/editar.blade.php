@extends('adm.layouts')



@section('content')

<form method="post" action="{{route('updatecalidad',$calidad->id)}}" enctype="multipart/form-data">

	@csrf

  @method('put')

  <div class="form-group col-md-6">

    <label for="orden">orden</label>

    <input type="text" class="form-control" id="orden" name="orden" value="{{$calidad->orden}}">   

  </div>

  <div class="form-group col-md-6">

    <label for="nombre">Nombre</label>

    <input type="text" class="form-control" id="nombre" name="nombre" value="{{$calidad->nombre}}">

  </div>

  <div class="form-group ">
    <label for="descripcion">Descripcion</label>
    <textarea class="form-control" name="descripcion"  id="descripcion" cols="30" rows="10" value="">{!!$calidad->descripcion!!}</textarea>
  </div>

  <div class="form-group">

    <label for="imagen">Imagen (Tamaño de imagen 590x290)</label>

    <input type="file" class="form-control-file" id="imagen" name="imagen" value="" >
   
    

    <img src="{{asset(Storage::url($calidad->imagen))}}" class="img-thumbnail mt-4">

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
            
             height: 250,
                 fontNames: ['Montserrat'],
                 fontNamesIgnoreCheck: ['Segoe UI']
                //  toolbar: [
                //  ['style', ['style']],
                //  ['font', ['bold', 'underline', 'clear']],
                // // ['fontNames', ['fontname']],
                //  ['color', ['color']],
                //  ['para', ['ul', 'ol', 'paragraph']]
                 
                //  ]
         });

       
     });


</script> 

@endsection