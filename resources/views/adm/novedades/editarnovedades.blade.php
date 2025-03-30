@extends('adm.layouts')
@section('content')

    <div class="container my-5">
        <div class="row">
            <!--Editar Categorias-->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Editar Categorias
                        <div class="float-right">
                            <button class="btn btn-success "  data-toggle="modal" data-target="#modalAgregarCategoria">
                                
                               Nueva Categoria
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>Orden</th>
                                <th>Titulo</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                                @foreach ($categorias as $categoria)
                                    <tr>
                                        <td>{{$categoria->orden}}</td>
                                        <td>{{$categoria->titulo}}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <button   class="btn btn-warning" data-toggle="modal" data-target="#modalEditarCategoria" onclick="editarCategoriaNovedad({{$categoria->id}})">
                                                    Editar
                                                    </button>
            
                                                    <button    class="btn btn-danger "  onclick="eliminarCategoriaNovedad({{$categoria->id}})" >
                                                    Borrar
                                                    </button>        
                                            </div>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        Editar Imagen
                        <div class="float-right">
                            <button class="btn btn-success " data-toggle="modal" data-target="#modalAgregarNovedad" >
                                
                                Nueva Imagen
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>orden</th>
                                <th>Imagen</th>
                                <th>Categoria</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                                @foreach ($novedades as $novedad)
                                    <tr>
                                        <td>{{$novedad->orden}}</td>
                                        <td><img class="img-fluid" src="{{asset('images/novedades/'.$novedad->imagen)}}" width="300px"></td>
                                        <td>{{$novedad->categoria->titulo}}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <button   class="btn btn-warning " data-toggle="modal" data-target="#modalEditarNovedad" onclick="editarNovedad({{$novedad->id}})">
                                                    Editar
                                                    </button>
            
                                                    <button  class="btn btn-danger "  onclick="eliminarNovedad({{$novedad->id}})" >
                                                    Borrar
                                                    </button>        
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--Agregar Categoria-->
<div class="modal fade" id="modalAgregarCategoria" tabindex="-1" role="dialog" aria-labelledby="modaleditar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Agregar Categoria</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="formAgregarCategoria" enctype="multipart/form-data">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            
            <div class="modal-body">
                <label for="orden">Orden</label>
                <input type="text" class="form-control"  name="orden">
                <label for="tituloedit">Titulo</label>
                <input type="text" class="form-control" name="titulo">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Agregar</button>
            </div>
        </form>
      </div>
    </div>
</div>
<!--Editar Categoria-->
<div class="modal fade" id="modalEditarCategoria" tabindex="-1" role="dialog" aria-labelledby="modaleditar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Editar Categoria</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="formEditarCategoria" enctype="multipart/form-data">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            
            <div class="modal-body">
                <input type="hidden" id="id_categoria">
                <label for="orden">Orden</label>
                <input type="text" class="form-control"  name="orden" id="orden_edit">
                <label for="tituloedit">Titulo</label>
                <input type="text" class="form-control" name="titulo" id="titulo_edit">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Editar</button>
            </div>
        </form>
      </div>
    </div>
</div>
<!--Agregar Novedad-->
<div class="modal fade" id="modalAgregarNovedad" tabindex="-1" role="dialog" aria-labelledby="modaleditar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Agregar Imagen</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="formAgregarNovedad" enctype="multipart/form-data">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            
            <div class="modal-body">
                <label>Orden</label>
                <input type="text" class="form-control" name="orden" required>
        
                

              
                
                <label>Imagen</label>
                <input type="file" class="from-control-file" name="imgNovedad" required>
                <br>
                <small class="text-muted">Resolución Recomendada 860px * 425px</small>
                <br>
                <label>Categorias</label>
                
                <select class="form-control" name="category_id" required>
                    @if ($categorias->isEmpty())
                        <option value="" selected>No hay categorias, cargue algunas</option>
                    @else
                        <option value="" selected>Seleccione categoria</option>
                    @endif
                    @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->titulo}}</option>
                    @endforeach
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Agregar</button>
            </div>
        </form>
      </div>
    </div>
</div>
<!--Editar Novedad-->
<div class="modal fade" id="modalEditarNovedad" tabindex="-1" role="dialog" aria-labelledby="modaleditar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Editar Imagen</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="formEditarNovedad" enctype="multipart/form-data">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            
            <div class="modal-body">
                 <label>Orden</label>
                 
                 <input type="hidden" name="orden" id="id_novedad">
                <input type="text" class="form-control" name="orden" id="orden_novedad" required>

                <label>Imagen</label>
                <img class="img-fluid" id="previewImgNovedad" >
                <input type="file" class="from-control-file" name="imgNovedad" >
                <br>
                <small class="text-muted">Resolución Recomendada 860px * 425px</small>
                <br>
                <label>Categorias</label>
                
                <select class="form-control" name="category_id" id="select_categorias"required>
                    @if ($categorias->isEmpty())
                        <option value="" selected>No hay categorias, cargue algunas</option>
                    @else
                        <option value="" selected>Seleccione categoria</option>
                    @endif
                    @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->titulo}}</option>
                    @endforeach
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Editar</button>
            </div>
        </form>
      </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{asset('js/novedades.js?2')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

@endsection