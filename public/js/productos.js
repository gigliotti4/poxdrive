// const listaProductos=document.getElementById('tablaProductos');
// $(function(){
//     $('.btn_agregar').on('click',function(){
//         var prodNombre = $(this).attr('data-nombre');
//         var prodCategoria = $(this).attr('data-categoria');
//         var prodImagen=  $(this).attr('data-imagen');
//         var prodId= $(this).attr('data-id');
//         var producto={
//             nombre:prodNombre,
//             categoria:prodCategoria,
//             imagen:prodImagen,
//             id:prodId
//         }
//         agregarProductoLocalStorage(producto);
//         alertify.set('notifier','position', 'top-right');
//         alertify.notify('Producto Agregado!','success',3);
//     });
//     $('.borrar-producto').on('click',function(e){
//         console.log(e.target.className);
//         if(e.target.className==='borrar-producto'){
//             e.target.parentElement.parentElement.remove();
//           // console.log(e.target.getAttribute('data-id'));
//             borrarProductosLocalStorage(e.target.getAttribute('data-id'));
//             alertify.set('notifier','position', 'top-right');
//             alertify.notify('Producto Eliminado!','warning',3);
//         }
//     });
//     $('#formPresupuesto').on('submit',(e)=>{
//         e.preventDefault();
//         tomarProductos();
//     });
// });
function obtenerProductosLocalStorage(){
    let productos;
    //Revisamos los valores de localstorage
    if(localStorage.getItem('productos')===null){
        productos=[]
    }else{
        productos=JSON.parse(localStorage.getItem('productos'));
    }
    return productos;
}
function cargarProductos(){
    
    let productos= obtenerProductosLocalStorage();
    const tbody= document.createElement('tbody');
 //console.log(productos);
    productos.forEach(function(producto){
       
        const fila= document.createElement('tr');
        fila.innerHTML= `<td>
        <td class="py-5 filaCodigo">${producto.codigo}</td>
        <td class="py-5 filaSerie">${producto.serie}</td>
        <td class="py-5 filaNombre">${producto.nombre}</td>
        <td class="py-5 filadimensionA">${producto.dimensionA}</td>
        <td class="py-5 filadimensionB">${producto.dimensionB}</td>
        <td class="py-5 filadimensionD">${producto.dimensionD}</td>
        <td class="py-5 filadimensionD">${producto.dimensionD}</td>

        

        <td class="py-5" style="width:150px"><input class="form-control inputCant" type="number" value="1" name="cantidad[]"></td>
        <td class="text-center py-5"><div class="borrar-producto" data-id="${producto.id}" ></div></td>
        `;
        
       tbody.appendChild(fila);
       //console.log(fila);

    });
    listaProductos.appendChild(tbody);
}
//function borrar tweet del DOM
function borrarProducto(e){
    e.preventDefault();
    
}


//agrega tweet al local storage
// function agregarProductoLocalStorage(producto){
//     let productos;
//     productos=obtenerProductosLocalStorage();
//     //añadir el nuevo tweet
//     productos.push(producto);
//     //convertir un strina a arreglo en local storage
//     localStorage.setItem('productos',JSON.stringify(productos));
   
// }



//Eliminar tweet del localstorage
function borrarProductosLocalStorage(productoBorrar){
    let productos;
    //Elimina la X del tweet
   // productoBorrar=producto.substring(0,producto.length-1);
    productos=obtenerProductosLocalStorage();
    productos.forEach(function(producto,index){
        if(productoBorrar==producto.id){
            productos.splice(index,1);
        }
    });
    localStorage.setItem('productos',JSON.stringify(productos));
    //console.log(tweets);
    
}
function tomarProductos(){
   
    let productos=[];
    $('#tablaProductos').find('tbody').find('tr').each(function(){
        var prod={
            codigo: $(this).find('.filaCodigo').html(),
            cantidad: $(this).find('.inputCant').val(),
            nombre: $(this).find('.filaNombre').html(),
            serie: $(this).find('.filaSerie').html(),
        }
        productos.push(prod);
    });
    const form= new FormData($('#formPresupuesto')[0]);
    form.append('productos',JSON.stringify(productos));
    $.ajax({
        type: "POST",
        url: "/solicitarPresupuesto",
        data: form,
        processData: false,  // tell jQuery not to process the data
        contentType: false,   // tell jQuery not to set contentType
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if(response){
                swal('Presuesto Solicitado',"","success");
               location.reload();
            }else{
                swal('Algo falló',"","warning");
            }
          
          console.log(response);
        },
        error: function(response) {
            console.log(response);
            swal("Hubo un problema","","error");
        }
    });
}