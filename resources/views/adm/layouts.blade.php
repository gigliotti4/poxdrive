<!DOCTYPE html>

<html lang="en">



<head>



    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">

    <meta name="author" content="">



    <title>Panel de Control | Poxdrive</title>



    <!-- Custom fonts for this template-->

    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

    <link

        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"

        rel="stylesheet">



    <!-- Custom styles for this template-->

    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

    {{-- summernote --}}



    <!-- include libraries(jQuery, bootstrap) -->

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />



    <style>

        .color{

            background-color: #000000;

        }



    </style>

</head>



<body id="page-top">



    <!-- Page Wrapper -->

    <div id="wrapper">



        <!-- Sidebar -->

        <ul class="navbar-nav color sidebar sidebar-dark accordion" id="accordionSidebar">



            <!-- Sidebar - Brand -->

            <a class="sidebar-brand d-flex align-items-center justify-content-center" 

            href="{{route('home')}}">

                {{-- <img src="{{asset('img/cordon-oro.png')}}" alt="" class="w-50"> --}}

                <span style="font-size: 14px; color:" class="shadow">Poxdrive</span>

            </a>



            <!-- Divider -->

            <hr class="sidebar-divider my-0">



           



            <!-- Divider -->

            <hr class="sidebar-divider">



           

            <!-- Nav Item - Pages Collapse Menu -->

            <li class="nav-item">

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"

                    aria-expanded="true" aria-controls="collapseTwo">

                    <i class="fas fa-home"></i>

                    <span  class="font-weight-bold">Home</span>

                </a>

                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

                    <div class="bg-white py-2 collapse-inner rounded">

                         <a class="collapse-item" href="{{route('slider', 'inicio')}}">Slider</a>

                         <a class="collapse-item" href="{{route('editarinicio', 1)}}">Editar Contenido</a> 

                         {{-- <a class="collapse-item" href="{{route('marcas')}}">Clientes</a> 

                        <a class="collapse-item" href="{{route('iconos')}}">Editar Icono</a>--}}

                    </div>

                </div>

            </li>



            <!-- Nav Item - Utilities Collapse Menu -->

            <li class="nav-item">

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"

                    aria-expanded="true" aria-controls="collapseUtilities">

                    <i class="fas fa-city"></i>

                    <span class="font-weight-bold">Empresa</span>

                </a>

                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"

                    data-parent="#accordionSidebar">

                    <div class="bg-white py-2 collapse-inner rounded">

                      <a class="collapse-item" href="{{route('slider', 'empresa')}}">Slider</a>

                        {{-- <a class="collapse-item" href="{{route('icono')}}">Icono</a> --}}

                        <a class="collapse-item" href="{{route('editarempresa', 1)}}">Editar Contenido</a> 

                    </div>

                </div>

            </li>



            <!-- Divider -->

            







            

            <li class="nav-item">

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsepaneles"

                    aria-expanded="true" aria-controls="collapsePages">

                    <i class="fas fa-mail-bulk"></i>

                    <span class="font-weight-bold">Productos</span>

                </a>

                <div id="collapsepaneles" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">

                    <div class="bg-white py-2 collapse-inner rounded"> 

                        <a class="collapse-item" href="{{route('categorias')}}">categorias</a>
                        <a class="collapse-item" href="{{route('subcategorias')}}">subcategorias</a>

                        <a class="collapse-item" href="{{route('productos')}}">productos</a>

                               

                    </div>

                </div>

            </li>

            <li class="nav-item">

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefamilias"

                    aria-expanded="true" aria-controls="collapsePages">

                    <i class="fas fa-mail-bulk"></i>

                    <span class="font-weight-bold">Herramientas</span>

                </a>

                <div id="collapsefamilias" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">

                    <div class="bg-white py-2 collapse-inner rounded"> 

                        <a class="collapse-item" href="{{route('familias')}}">familias</a>
          

                        <a class="collapse-item" href="{{route('items')}}">Items</a>

                               

                    </div>

                </div>

            </li>


             <li class="nav-item">

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsedis"

                    aria-expanded="true" aria-controls="collapsePages">

                    <i class="fas fa-mail-bulk"></i>

                    <span class="font-weight-bold">Carta de Colores</span>

                </a>

                <div id="collapsedis" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">

                    <div class="bg-white py-2 collapse-inner rounded"> 

                        <a class="collapse-item" href="{{route('colores')}}">Colores</a>


                    </div>

                </div>

            </li>



        
            <li class="nav-item">

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseuso"

                    aria-expanded="true" aria-controls="collapsePages">

                    <i class="fas fa-mail-bulk"></i>

                    <span class="font-weight-bold">Instructivo de uso</span>

                </a>

                <div id="collapseuso" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">

                    <div class="bg-white py-2 collapse-inner rounded"> 
                        <a class="collapse-item" href="{{route('usos')}}">Items</a>
                    </div>

                </div>

            </li>
            <li class="nav-item">

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDistribuidores"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-mail-bulk"></i>
                    <span class="font-weight-bold">Distribuidores</span>
                </a>

                <div id="collapseDistribuidores" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded"> 
                        <a class="collapse-item" href="{{route('distribuidores')}}">Items</a>
                    </div>
                </div>

            </li>
            <li class="nav-item">

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsegaleria"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-mail-bulk"></i>
                    <span class="font-weight-bold">Galeria</span>
                </a>

                <div id="collapsegaleria" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded"> 
       
                        <a class="collapse-item" href="{{route('novedades.editarContenido')}}">Imagenes</a>
                    </div>
                </div>

            </li>

            <li class="nav-item">

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsenew"

                    aria-expanded="true" aria-controls="collapsePages">

                    <i class="fas fa-mail-bulk"></i>

                    <span class="font-weight-bold">
                        Newsletter
                    </span>

                </a>

                <div id="collapsenew" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">

                    <div class="bg-white py-2 collapse-inner rounded"> 

                        <a class="collapse-item" href="{{route('Subcriptores.view')}}">Subcriptores</a>          

                    </div>

                </div>

            </li> 

    
            <li class="nav-item">

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsecontacto"

                    aria-expanded="true" aria-controls="collapsePages">

                    <i class="fas fa-address-book"></i>

                    <span class="font-weight-bold">Contacto</span>

                </a>

                <div id="collapsecontacto" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">

                    <div class="bg-white py-2 collapse-inner rounded"> 

                        <a class="collapse-item" href="{{route('editarcontacto', 1)}}">Editar Contacto</a>

                        <a class="collapse-item" href="{{route('editarredes', 1)}}">Editar Redes sociales</a>

                        <a class="collapse-item" href="{{route('logos')}}">Editar logos</a>   

                    </div>

                </div>

               

            </li>

            <li class="nav-item">

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseusuarios"

                    aria-expanded="true" aria-controls="collapsePages">

                    <i class="fas fa-mail-bulk"></i>

                    <span class="font-weight-bold">Usuarios</span>

                </a>

                <div id="collapseusuarios" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">

                    <div class="bg-white py-2 collapse-inner rounded"> 

                          <a class="collapse-item" href="{{route('usuarios')}}">Ver Usuarios</a> 

                               

                    </div>

                </div>

            </li>

            <li class="nav-item">

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsemetadatos"

                    aria-expanded="true" aria-controls="collapsePages">

                    <i class="fas fa-mail-bulk"></i>

                    <span class="font-weight-bold">

                        Metadatos

                    </span>

                </a>

                <div id="collapsemetadatos" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">

                    <div class="bg-white py-2 collapse-inner rounded"> 

                          <a class="collapse-item" href="{{route('metadatos')}}">Ver Metadatos</a> 

                               

                    </div>

                </div>

            </li>
{{-- 
          <li class="nav-item">

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsenew"

                    aria-expanded="true" aria-controls="collapsePages">

                    <i class="fas fa-mail-bulk"></i>

                    <span class="font-weight-bold">

                        Newsletter

                    </span>

                </a>

                <div id="collapsenew" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">

                    <div class="bg-white py-2 collapse-inner rounded"> 

                        <a class="collapse-item" href="{{route('Subcriptores.view')}}">Subcriptores</a> 

                               

                    </div>

                </div>

            </li> --}}

            <li class="nav-item">

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsesoporte"

                    aria-expanded="true" aria-controls="collapsePages">

                    <i class="fas fa-mail-bulk"></i>

                    <span class="font-weight-bold">

                        Soporte

                    </span>

                </a>

                <div id="collapsesoporte" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">

                    <div class="bg-white py-2 collapse-inner rounded"> 

                          <a class="collapse-item" href="mailto:soporte@osole.es">Enviar mail</a> 

                               

                    </div>

                </div>

            </li>



            <!-- Divider -->

            <hr class="sidebar-divider d-none d-md-block">



            <!-- Sidebar Toggler (Sidebar) -->

            <div class="text-center d-none d-md-inline">

                <button class="rounded-circle border-0" id="sidebarToggle"></button>

            </div>



            <!-- Sidebar Message -->





        </ul>

        <!-- End of Sidebar -->



        <!-- Content Wrapper -->

        <div id="content-wrapper" class="d-flex flex-column">



            <!-- Main Content -->

            <div id="content">



                <!-- Topbar -->

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">



                    <!-- Sidebar Toggle (Topbar) -->

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">

                        <i class="fa fa-bars"></i>

                    </button>



                    <!-- Topbar Search -->

                   



                    <!-- Topbar Navbar -->

                    <ul class="navbar-nav ml-auto">



                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->

                        <li class="nav-item dropdown no-arrow d-sm-none">

                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"

                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <i class="fas fa-search fa-fw"></i>

                            </a>

                            <!-- Dropdown - Messages -->

                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"

                                aria-labelledby="searchDropdown">

                                <form class="form-inline mr-auto w-100 navbar-search">

                                    <div class="input-group">

                                        <input type="text" class="form-control bg-light border-0 small"

                                            placeholder="Search for..." aria-label="Search"

                                            aria-describedby="basic-addon2">

                                        <div class="input-group-append">

                                            <button class="btn btn-primary" type="button">

                                                <i class="fas fa-search fa-sm"></i>

                                            </button>

                                        </div>

                                    </div>

                                </form>

                            </div>

                        </li>



                      

                       

                        <div class="topbar-divider d-none d-sm-block"></div>



                        <!-- Nav Item - User Information -->

                        <li class="nav-item dropdown no-arrow">

                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"

                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth()->user()->name}}</span>

                                <img class="img-profile rounded-circle"

                                    src="{{asset('img/undraw_profile.svg')}}">

                            </a>

                            <!-- Dropdown - User Information -->

                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"

                                aria-labelledby="userDropdown">

                                

                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal" onclick="event.preventDefault();

                                    document.getElementById('logout-form').submit();">

                                    Cerrar session

                                </a>

                        

                            <form class="form-inline my-2 my-lg-0" id="logout-form" action="{{route('logout')}}" method="POST">

                                @csrf

                                </form>

                            </div>



                        </li>



                    </ul>



                </nav>

                <!-- End of Topbar -->



               

            </li>



                <!-- Begin Page Content -->

                <div class="container-fluid">



                    <!-- Page Heading -->

                   @yield('content')



                </div>

                <!-- /.container-fluid -->



            </div>

            <!-- End of Main Content -->



            <!-- Footer -->

            <footer class="sticky-footer bg-white">

                <div class="container my-auto">

                    <div class="copyright text-center my-auto">

                        <span>Copyright &copy; Your Website 2020</span>

                    </div>

                </div>

            </footer>

            <!-- End of Footer -->



        </div>

        <!-- End of Content Wrapper -->



    </div>

    <!-- End of Page Wrapper -->



   

    <!-- Bootstrap core JavaScript-->

    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>



    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>



    <!-- Core plugin JavaScript-->

    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>



    <!-- Custom scripts for all pages-->

    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>



    <!-- Page level plugins -->

    



    @yield('js')



</body>



</html>