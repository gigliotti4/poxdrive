@extends('adm.layouts')



@section('content')

<form method="post" action="{{route('updateusos',$usos->id)}}" enctype="multipart/form-data">

	@csrf

  @method('put')
<div class="row">

  <div class="form-group col-md-6">
    <label for="orden">orden</label>
    <input type="text" class="form-control" id="orden" name="orden" value="{{$usos->orden}}">   
  </div>

  <div class="form-group col-md-6">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" value="{{$usos->nombre}}">
  </div>
</div>

<div class="row">
 
    <div class="form-group col-md-6">
      <label for="youtube">youtube</label>
      <input type="text" class="form-control" id="youtube"  name="youtube" value="{{$usos->youtube}}">
      <span>
        https://www.youtube.com/watch?v=
        <strong>xxxx</strong>
      </span>
    </div>
 
    <div class="form-group mb-3 col-md-6">
      <label for="role">Categoria</label>
      <select class=" form-control" id="rol" name="rol" aria-label="">
        @if($usos->rol == 'pdf')
        <option value="pdf" selected>pdf</option>
        <option value="video" >video</option>
        @else
        <option value="pdf" >pdf</option>
        <option value="video" selected>video</option>
        @endif
      </select>
    </div>
  </div>
  
  <div class="row">

    <div class="form-group col-md-6">
      <label for="videos">video</label>
      <input type="file" class="form-control-file" id="videos" name="videos" value="" >
      <span>{{asset(Storage::url($usos->videos))}}</span>
    
    </div>
  
  
    <div class="form-group col-md-6">
      <label for="pdf">pdf</label>
      <input type="file" class="form-control-file" id="pdf" name="pdf" value="" >
      <span>{{asset(Storage::url($usos->pdf))}}</span>
    </div>
  </div>

  


 <button type="submit" class="btn btn-success">Editar</button>

</form>





@endsection