

function addtt(){
    
    var addList = document.getElementById('nuevos');

    var text = document.createElement('div');
    
    text.innerHTML = 
    '<hr>'+
    '<div class="p-3" style="background-color:#e1e3e2">'+
    '<div class="row">'+

    '<div class="col-md-6">'+
    '<label>Imagen</label>'+
    '<input type="file" name="img[]" id="img[]" class="form-control">' +
    '</div>'+
    '<div class="col-md-6">'+
    '<label>codigo</label>'+
    '<input type="text" name="codigo[]" id="codigo[]" class="form-control">' +
    '</div>'+
    '<div class="col-md-6">'+
    '<label>descripcion</label>'+
    '<input type="text" name="texto[]" id="texto[]" class="form-control">'+
    '</div>'+
    '<div class="col-md-6">'+
    '<label>medida</label>'+
    '<input type="text" name="medida[]" id="medida[]" class="form-control">' +
    '</div>'+
    '<div class="col-md-6">'+
    '<label>Precio minorista</label>'+
    '<input type="text" name="precioun[]" id="precioun[]" class="form-control">'+
    '</div>'+
    '</div>'+
    '</div>';
    addList.appendChild(text);
     $('.summernote').summernote();
    // $('.summernoteen').summernote();

}

