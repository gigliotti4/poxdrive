<div class="shadow">
  <div class="fondoheader">
    <div class="container">
    <div class="d-flex justify-content-end pt-2">

      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
        <path d="M14.9999 1.66669H12.4999C11.3949 1.66669 10.335 2.10567 9.55364 2.88708C8.77224 3.66848 8.33325 4.72828 8.33325 5.83335V8.33335H5.83325V11.6667H8.33325V18.3334H11.6666V11.6667H14.1666L14.9999 8.33335H11.6666V5.83335C11.6666 5.61234 11.7544 5.40038 11.9107 5.2441C12.0669 5.08782 12.2789 5.00002 12.4999 5.00002H14.9999V1.66669Z" fill="black"/>
      </svg>
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" class="ms-3">
        <g clip-path="url(#clip0_255_125)">
          <path d="M14.1667 1.66669H5.83341C3.53223 1.66669 1.66675 3.53217 1.66675 5.83335V14.1667C1.66675 16.4679 3.53223 18.3334 5.83341 18.3334H14.1667C16.4679 18.3334 18.3334 16.4679 18.3334 14.1667V5.83335C18.3334 3.53217 16.4679 1.66669 14.1667 1.66669Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M13.3333 9.47501C13.4361 10.1685 13.3176 10.8769 12.9947 11.4992C12.6718 12.1215 12.1609 12.6262 11.5346 12.9414C10.9083 13.2566 10.1986 13.3663 9.50641 13.255C8.81419 13.1436 8.17472 12.8167 7.67895 12.321C7.18318 11.8252 6.85636 11.1857 6.74497 10.4935C6.63359 9.8013 6.74331 9.09159 7.05852 8.46532C7.37374 7.83905 7.87841 7.32812 8.50074 7.00521C9.12307 6.68229 9.83138 6.56383 10.5249 6.66667C11.2324 6.77158 11.8873 7.10123 12.393 7.60693C12.8987 8.11263 13.2283 8.76757 13.3333 9.47501Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M14.5833 5.41669H14.5933" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </g>
        <defs>
          <clipPath id="clip0_255_125">
            <rect width="20" height="20" fill="white"/>
          </clipPath>
        </defs>
      </svg>
    </div>
    </div>
  </div>
    <div class="container">        
      <nav class="navbar navbar-expand-lg navbar-light p-0 ">
           <a class="navbar-brand mr-5 p-0" href="{{route('page.inicio')}}">
              @foreach($logosheader as $l)
              <img src="{{asset(Storage::url($l->imagen))}}" class="img-fluid my-3" style=" width: auto;">
              @endforeach
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
              <div class="collapse navbar-collapse flex-column align-content-end align-items-end align-self-end mb-4"  id="navbarNav">

           
                   <div class="navbar-nav ">
                        <a class="nav-item nav-link header__enlace   {{ $active == 'page.empresa' ? 'activeheader' : ''}}" href="{{route('page.empresa')}}">Empresa</a>
                        <a class="nav-item nav-link header__enlace   {{ $active == 'page.categorias' ? 'activeheader' : ''}}" href="{{route('page.categorias')}}">Productos</a> 
                        <a class="nav-item nav-link header__enlace   {{ $active == 'page.aplicaciones' ? 'activeheader' : ''}}" href="{{route('page.aplicaciones')}}">Usos y aplicaciones</a> 
                        <a class="nav-item nav-link header__enlace   {{ $active == 'page.colores' ? 'activeheader' : ''}}" href="{{route('page.colores')}}">Carta de colores</a> 
                        <a class="nav-item nav-link header__enlace   {{ $active == 'page.familias' ? 'activeheader' : ''}}" href="{{route('page.familias')}}">Herramientas</a> 
                        <a class="nav-item nav-link header__enlace   {{ $active == 'page.usos' ? 'activeheader' : ''}}" href="{{route('page.usos')}}">Instructivos de uso</a> 
                        <a class="nav-item nav-link header__enlace   {{ $active == 'page.distribuidores' ? 'activeheader' : ''}}" href="{{route('page.distribuidores')}}">Distribuidores</a>                     
                       <a class="nav-item nav-link  header__enlace  {{ $active == 'page.novedades' ? 'activeheader' : ''}}" href="{{route('page.novedades')}}">Galeria</a>
                        <a class="nav-item nav-link header__enlace {{ $active == 'page.contactos' ? 'activeheader' : ''}}" href="{{route('page.contacto')}}">Contacto</a>          
                    </div>
    
              </div>
      </nav>
    
    </div>  
</div>




<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->







