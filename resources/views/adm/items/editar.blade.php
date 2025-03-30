@extends('adm.layouts')

<script src="{{asset('js/producto.js')}}"></script>
@section('content')



<form method="post" action="{{route('updateitems',$items->id)}}" enctype="multipart/form-data">
	@csrf
  @method('put')
  <div class="row">
    <div class="form-group col-md-4">
      <label for="orden">orden</label>
      <input type="text" class="form-control" id="orden" name="orden" value="{{$items->orden}}">
      
    </div>
   
    <div class="form-group col-md-4">
      <label for="nombre">Nombre</label>
      <input type="text" class="form-control" id="nombre" name="nombre" value="{{$items->nombre}}">
    </div>
  </div>


 
   

  <div class="row">

    <div class="form-group col-md-6">
      <label for="familia_id">Seleccione Categoria</label>
        <select name="familia_id" id="familia_id" class="form-control" >
          @foreach($familias as $c)
            <option value="{{$c->id}}"  @if($c->id== $items->familia_id) selected @endif>{{$c->nombre}}</option>
          @endforeach
        </select>
    </div>
    
    
    
  </div>
  

 
  
  
  
    
  <div class="form-group ">
    <label for="descripcion">Descripcion</label>
    <textarea class="form-control" name="descripcion"  id="descripcion" cols="30" rows="10" value="">{!!$items->descripcion!!}</textarea>
  </div>

        


  <div class="row">
    



    
    <div class="form-group col-md-6">
      <label for="imagen">Imagen (Tamaño recomendado: 1080X1080 px)</label>
      <input type="file" class="form-control-file" id="imagen" name="imagen">
      <img src="{{asset(Storage::url($items->imagen))}}" class="img-thumbnail mt-4">
    </div>

  </div>

  
  <div class="form-group col-md-6">

    <label for="galeria">galeria (Tamaño recomendado: 1080X1080 px)</label>

    <input type="file" class="form-control-file" id="galeria" name="galeria[]" value="" multiple="">

    <?php $galerias = explode(',', $items->galeria); ?>

    <div class="d-flex my-3">

      @foreach($galerias as $key => $galeria)

        <div>

          <a  href="{{route('borraritem',[$items->id, $key])}}" class="btn btn-danger" style="  position: absolute; text-align: center;" > <i class="fas fa-times " style="color: white;"></i> </a>

          <img src="{{asset(Storage::url($galeria))}}" class="border" style="width:200px;  margin-right: 13px;">

        </div>


      @endforeach

    </div>

  </div>



  <div class="d-flex flex-column">   
    <span>items destacados</span>
    <div class="form-check form-check-inline">
      <label class="form-check-label mr-3" for="inlineCheckbox1">Si</label>
      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="destacado" @if($items->destacado == 1) checked="" @endif>
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
            
          placeholder: 'Escriba texto..',
          tabsize: 2,
          height: 250,
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

         const familia = document.querySelector('#familia_id');
           const subfamilia = document.querySelector('#subfamilia_id');
           console.log(familia)
           const selectedOption = familia.options[familia.selectedIndex].value;
            if(selectedOption == 1){
               document.getElementById("subfamilia_id").classList.remove("d-none");
            }else{
              document.getElementById("subfamilia_id").classList.add("d-none");
            }
          familia.addEventListener('change', (event) => { 
            const selectedOption = familia.options[familia.selectedIndex].value;
            if(selectedOption == 1){
               document.getElementById("subfamilia_id").classList.remove("d-none");
            }else{
              document.getElementById("subfamilia_id").classList.add("d-none");
            }

              console.log(selectedOption)
             
          });
     });


</script> 



@endsection