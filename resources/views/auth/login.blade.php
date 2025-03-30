@extends('layouts.app')
<style>
  
  #body {
    font-family: 'Nunito';
  background-color:  #5d8fc9;
  }
  #login-card{
      width:350px;
      border-radius: 25px;
      margin:150px auto;
    
  }
  
  #email{
      border-radius:30px;
      background-color: #ebf0fc;
      border-color: #ebf0fc;
      color: #9da3b0;
  }
  
  #button{
      border-radius:30px;
  
  }
  
  #btn{
     position: absolute; 
     bottom: -35px; 
     padding: 5px;
     margin: 0px 55px;
     align-items: center;
     border-radius: 5px"
  }
  #container{
      margin-top:25px;
  }
  
  .btn-circle.btn-sm { 
              width: 40px; 
              height: 40px; 
              padding: 2px 0px; 
              border-radius: 25px; 
              font-size: 14px; 
              text-align: center;
              
              margin: 8px;
          }

</style>
@section('content')



<body id="body">

  <div id="login-card" class="card">
  <div class="card-body">
    <h2 class="text-center" style="color:#D80201;">Poxdrive</h2>
    <br>
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="form-group">
        <input type="text" name="username"  required class="{{ $errors->has('username') ? ' is-invalid' : '' }} form-control">
        @if ($errors->has('username'))
          <span class="invalid-feedback">
              <strong>{{ $errors->first('username') }}</strong>
          </span>
       @endif
      </div>
      <div class="form-group">
        <input type="password" class="@error('password') is-invalid @enderror form-control"  name="password" required autocomplete="current-password">
        @error('password')
          <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <button type="submit" id="button" class="btn btn-primary deep-purple btn-block ">Ingresar</button>
 
     
    
    </form>
  </div>
  <div>

@endsection
