@extends('layouts.plantilla')
@section('content')

<div class="cabecera__contenedor "> 
    <div class="container">   
           <div class="row">     
               <div class="d-flex align-items-start flex-column bg__cabecera">
                   <span class="mt-auto pb-4 cabecera__miga" style="">Presupuesto</span> 
                   
                </div>          

            </div>
        </div>
</div>





<div class="container my-5">
    <div class="row justify-content-center">
        
        <div id="primero" class=" col-md-12 py-5" style="">
            <form novalidate="" id="form"  enctype="multipart/form-data">
                @csrf
            <div class="row">
                <div class="form-floating mb-3 col-md-6">
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                    <label for="nombre" style="" class=" formulario ms-3">Nombre*</label>
                  </div>
                  <div class="form-floating mb-3 col-md-6">
                  <input type="text" class="form-control" id="email" name="email" placeholder="email">
                  <label for="email" style="" class=" formulario ms-3">Email*</label>
                </div>
            </div>
            <div class="row mt-3">
                <div class="form-floating mb-3 col-md-6">
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="telefono">
                    <label for="telefono" style="" class= "formulario ms-3">Telefono</label>
                  </div>
                  <div class="form-floating mb-3 col-md-6">
                    <input type="text" class="form-control" id="empresa" name="empresa" placeholder="empresa">
                    <label for="empresa" style="" class=" formulario ms-3">Empresa</label>
                  </div>
            </div>

            <div class="row mt-3">
                

                <div class="form-floating col-md-6 ">
                    <textarea class="form-control" placeholder="Leave a comment here" id="mensaje" name="mensaje" style="height: 100px"></textarea>
                    <label for="mensaje" style="" class=" formulario ms-3">Escriba un Mensaje...</label>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div>
                        <label for="inputGroupFile" class="form-label formulario">Adjuntar Archivo</label>
                        <div class="input-group custom-file-button ">
                            <input type="text" class="form-control" id="empresa" name="" disabled placeholder="">
                            <input type="file" class="form-control " id="inputGroupFile" name="file" style="display: none">
                            <label class="input-group-text " for="inputGroupFile">
                                Adjuntar
                            </label>
                        </div>
                    </div>    
                </div>
                


            </div>
            
            <div class="col-12 d-flex justify-content-end mt-4">
                {{-- <button onclick="anterior()" type="button" class="btn px-5 btn-outline-light text-uppercase" style="color: #E10915;border:1px solid #E10915">volver</button> --}}
                <button type="submit" class="btn btn-consulta mt-4 px-5 py-2  ">Enviar presupuesto
                                  
                </button>	
               
            </div>
            
           
        </div>
       
    </form>
    </div>
    
</div>




@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
<script>
    $(document).ready(function(){
        $("#form").validate({ //inicamos la validación del formulario
           //Cada cosa que configures la debes de terminar con una coma ,
           onfocusout: false,  //Si un objeto no cumple con la validación, tomara el foco
           rules: { //iniciamos sección de reglas
               nombre: { //estas seras las reglas para el objeto que en su propiedad name tenga nameO
                   required: true //indicamos que es requerido que contenga un valor
               },
               email: {
                   required: true,
                   email: true //indicamos que debe de cumplir con la estructura de un email
               },
               telefono:{
                   required:true,
                   digits:true,
               },
               producto:{
                required:true,
               }
          },
           messages: {//estos seran los mensaje que aparezcan segun el objeto y la reque que espeficiquemos en la sección de reglas
               nombre: {
                   required: "Este campo es necesario"
               },
               email: {
                   required: "Este campo es necesario",
                   email: "No cumple con la estructura de un correo."
               },
               telefono:{
                   required: "Por favor indique su telefono",
                   digits: "Ingrese solo numeros"
               },
               producto:{
                required:"Por favor indique un producto",
               }
          },
          submitHandler: function(){ //si todos los controles cumplen con las validaciones, se ejecuta este codigo
             //para ocultar el mensaje, le agregamos la clase de Bootstrap 3
             
             $('.spinner-border').removeClass('d-none');
            $('.btn-text').text('Enviando');
            let form= new FormData($('#form')[0])
               $.ajax({
                   type: 'POST',
                   url: 'presupuesto',
                   //data: {nombre:nombre,email:correo,mensaje:mensaje,telefono:tel,empresa:empresa_form,file:archivo},
                   data:form,
                   processData:false,
                    contentType:false,
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }, //parametros (valores) en formato llaver:valor, que se enviaran con la solicitudd
                 success: function(response) {
                   //se llama cuando tiene éxito la respuesta

                   swal("Muchas Gracias!", "Hemos recibido tu consulta!", "success");
                   $('#form')[0].reset();
                 },
                 error: function(response) {
                   console.log(response);
                   swal ( "Oops" ,  "Algo salio mal!" ,  "error" )

                 },complete:function(){
                   $('.spinner-border').addClass('d-none');
                   $('.btn-text').text('Enviar');
                   }
               });
          },
          invalidHandler: function(event, validator) { //si por lo menos uno control no cumplen con las validaciones, se ejecuta este codigo
               var errors = validator.numberOfInvalids(); // número de errores encontrados al validar el formulario
               if (errors) { //si errors = 0 no se ejecuta el if, de ser mayor que cero se ejecuta
                   //la linea de abajo es un if ternario
                   var message = errors == 1 ? ' Error: Te perdiste 1 campo. Ha sido destacado' : ' Error: Te perdiste '+ errors +' campos. Se han destacado';
                   $("div#formError span#Mensaje").html(message); //agregamos el valor de message a objeto seleccionado
                   $("div#formError").removeClass("hidden"); //para que se muestre el mensaje, le quitamos la clase que lo oculta
               }
           },
           highlight: function(element, errorClass) {//los objetos que no cumplan con la validación parpadearan
               $(element).fadeOut(function() {
                   $(element).fadeIn();
               });
           },
           errorElement: "div", //indicamos en qué tipo de objeto DOM se agregarán las alertas. El valor por default es "label"
           errorClass: "alert alert-danger", //indicamos la clase que se agregara a las alertas. El valor por default es "error"
       });
    });
    function PrimerValidacion(){
        if($("#form").valid()){ // test for validity 
            siguiente();
        } else { 
          
         } 
    }
   
      
  
    function siguiente(){
        $('#primero').addClass('d-none');
        $('#segundo').removeClass('d-none');
        $('.cositoConsulta').attr('src','img/cositoazul.png');
        $('.cositoDatos').attr('src','img/cositogris.png');
        $('#icono_chat').attr('src','img/chat2.svg');
        $('#icono_edit').attr('src','img/edit2.svg');
    }
    function anterior(){
        $('#primero').removeClass('d-none');
        $('#segundo').addClass('d-none');
        $('#icono_chat').attr('src','img/chat.svg');
        $('#icono_edit').attr('src','img/edit.svg');
        $('.cositoConsulta').attr('src','img/cositogris.png');
        $('.cositoDatos').attr('src','img/cositoazul.png');
    }    
</script>



@endsection


