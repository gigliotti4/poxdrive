

function addtt(){
    
    var addList = document.getElementById('nuevos');

    var text = document.createElement('div');
    
    text.innerHTML = 
    '<hr>'+
    '<div class="p-3" style="background-color:#e1e3e2">'+
    '<div class="row">'+
    '<div class="col-md-6">'+
    '<label>cantidad</label>'+
    '<input type="number" name="cantidad[]" id="cantidad[]" min="1" class="form-control">' +
    '</div>'+
    '<div class="col-md-6">'+
    '<label>descuento</label>'+
    '<input type="number" name="descuento[]" id="descuento[]" min="1" class="form-control" >'+
    '</div>'+
   
    '</div>'+
   
    
    
    
   
    '</div>';
    addList.appendChild(text);
     $('.summernote').summernote();
    // $('.summernoteen').summernote();

}

