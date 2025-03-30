$(function() {
    $('#summerEpigrafe').summernote({
        tabsize: 2,
        lang: 'es-ES',
        height: 180,
        fontNames: ['Montserrat-Bold', 'Montserrat-Light', 'Montserrat-Medium', 'Montserrat-Regular', 'Montserrat-SemiBold'],
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['fontNames', ['fontname']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']]
        
        ]
    });
    $('#summerEpigrafe_edit').summernote({
        tabsize: 2,
        lang: 'es-ES',
        height: 180,
        fontNames: ['Montserrat-Bold', 'Montserrat-Light', 'Montserrat-Medium', 'Montserrat-Regular', 'Montserrat-SemiBold'],
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['fontNames', ['fontname']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']]
        
        ]
    });
    $('#summerEpigrafeIngles').summernote({
        tabsize: 2,
        lang: 'es-ES',
        height: 180,
        fontNames: ['Montserrat-Bold', 'Montserrat-Light', 'Montserrat-Medium', 'Montserrat-Regular', 'Montserrat-SemiBold'],
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['fontNames', ['fontname']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']]
        
        ]
    });
    $('#summerEpigrafeIngles_edit').summernote({
        tabsize: 2,
        lang: 'es-ES',
        height: 180,
        fontNames: ['Montserrat-Bold', 'Montserrat-Light', 'Montserrat-Medium', 'Montserrat-Regular', 'Montserrat-SemiBold'],
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['fontNames', ['fontname']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']]
        
        ]
    });
    $('#summerTexto').summernote({
        tabsize: 2,
        lang: 'es-ES',
        height: 180,
        fontNames: ['Montserrat-Bold', 'Montserrat-Light', 'Montserrat-Medium', 'Montserrat-Regular', 'Montserrat-SemiBold'],
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['fontNames', ['fontname']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']]
        
        ]
    });
    $('#summerTexto_edit').summernote({
        tabsize: 2,
        lang: 'es-ES',
        height: 180,
        fontNames: ['Montserrat-Bold', 'Montserrat-Light', 'Montserrat-Medium', 'Montserrat-Regular', 'Montserrat-SemiBold'],
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['fontNames', ['fontname']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']]
        
        ]
    });
    $('#summerTextoIngles').summernote({
        tabsize: 2,
        lang: 'es-ES',
        height: 180,
        fontNames: ['Montserrat-Bold', 'Montserrat-Light', 'Montserrat-Medium', 'Montserrat-Regular', 'Montserrat-SemiBold'],
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['fontNames', ['fontname']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']]
        
        ]
    });
    $('#summerTextoIngles_edit').summernote({
        tabsize: 2,
        lang: 'es-ES',
        height: 180,
        fontNames: ['Montserrat-Bold', 'Montserrat-Light', 'Montserrat-Medium', 'Montserrat-Regular', 'Montserrat-SemiBold'],
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['fontNames', ['fontname']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']]
        
        ]
    });
    $('#formAgregarCategoria').on('submit',function(e){
        e.preventDefault();
        const form= new FormData($('#formAgregarCategoria')[0]);
        $.ajax({
            type: "POST",
            url: "agregarCategoriaNovedad",
            data: form,
            processData:false,
            contentType:false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                swal("Categoria Agregada","","success");
                setTimeout(function(){location.reload()},1500);
            },
            error: function(response){
                console.log(response);
                swal("Algo salio mal","","error");
            }
        });
   });
    $('#formEditarCategoria').on('submit',function(e){
    e.preventDefault();
    const id= $('#id_categoria').val();
    const form= new FormData($('#formEditarCategoria')[0]);
    form.append('_method','PUT');
        $.ajax({
            type: "POST",
            url: "actualizarCategoriaNovedad/"+id,
            data: form,
            processData:false,
            contentType:false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                swal("Categoria Actualizada","","success");
                setTimeout(function(){location.reload()},1500);
            },
            error: function(response){
                console.log(response);
                swal("Algo salio mal","","error");
            }
        });
    });
    $('#formAgregarNovedad').on('submit',function(e){
        e.preventDefault();
        const form= new FormData($('#formAgregarNovedad')[0]);
     
        
            $.ajax({
                type: "POST",
                url: "agregarNovedad",
                data: form,
                processData:false,
                contentType:false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    swal("Novedad Agregada","","success");
                    setTimeout(function(){location.reload()},1500);
                },
                error: function(response){
                    console.log(response);
                    swal("Algo salio mal","","error");
                }
            });
    });
    $('#formEditarNovedad').on('submit',function(e){
        e.preventDefault();
        let id= $('#id_novedad').val();
        const form= new FormData($('#formEditarNovedad')[0]);
       
        form.append('_method','PUT');
            $.ajax({
                type: "POST",
                url: "actualizarNovedad/"+id,
                data: form,
                processData:false,
                contentType:false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    swal("Novedad Actualizada","","success");
                    setTimeout(function(){location.reload()},1500);
                },
                error: function(response){
                    console.log(response);
                    swal("Algo salio mal","","error");
                }
            });
    });
});
function editarCategoriaNovedad(id){
    $.ajax({
        type: "get",
        url: "editarCategoriaNovedad/"+id,
        success: function (response) {
        $('#id_categoria').val(id);
        $('#orden_edit').val(response.orden);
        $('#titulo_edit').val(response.titulo);
       
        }
    });
}
function editarNovedad(id){
    $.ajax({
        type: "get",
        url: "editarNovedad/"+id,
        success: function (response) {
        let path="../../images/novedades/";
        $('#id_novedad').val(id);
        $('#orden_novedad').val(response.orden);
        $('#previewImgNovedad').attr('src',path+response.imagen);
        
        
        $('#select_categorias').val(response.category_id);
        
        
       
        
        }
    });
}
function eliminarCategoriaNovedad(id){
    swal({
        title: "Esta seguro/a de eliminar una Categoria?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "DELETE",
                url: "eliminarCategoriaNovedad/"+id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    swal("Poof! Categoria Eliminada!","","success");
                      setTimeout(function(){location.reload()},1500);
                },
                error: function(response){
                    console.log(response);
                    swal("Algo salió mal","","error");
                }
            });

        } else {
          swal("No se borrado nada!");
        }
      });

}
function eliminarNovedad(id){
    swal({
        title: "Esta seguro/a de eliminar una Novedad?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "DELETE",
                url: "eliminarNovedad/"+id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    swal("Poof! Novedad Eliminada!","","success");
                      setTimeout(function(){location.reload()},1500);
                },
                error: function(response){
                    console.log(response);
                    swal("Algo salió mal","","error");
                }
            });

        } else {
          swal("No se borrado nada!");
        }
      });

}