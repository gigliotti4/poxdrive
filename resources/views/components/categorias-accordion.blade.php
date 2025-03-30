<style>
    .categoria:hover .categoria__titulo {
   font-family: 'Roboto';
   font-size: 24px;
   font-style: normal;
   font-weight: 500;
   line-height: normal;
   color: #B40C17;
   position: absolute;
   top: 75%;
   left: 6%;
   transition: .5s ease; 
 }

 .categorias__titulo {
    color: #333;
    font-family: 'Roboto', sans-serif;
    font-size: 26px;
    font-weight: 600;
    line-height: normal;
    padding-bottom: 15px;
    border-bottom: 2px solid #eee;
    margin-bottom: 20px;
  }

  .accordion-item {
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    margin-bottom: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    overflow: hidden;
  }

  .accordion-button {
    font-family: 'Roboto', sans-serif;
    font-size: 18px;
    font-weight: 500;
    text-align: left;
    padding: 15px 20px;
    background-color: #f9f9f9;
    border: none;
    border-radius: 8px 8px 0 0;
    width: 100%;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .accordion-button:focus {
    box-shadow: none;
  }

  .accordion-button::after {
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-chevron-down' viewBox='0 0 16 16'%3E%3Cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3E%3C/svg%3E");
    background-size: 1rem;
    transition: transform 0.2s ease-in-out;
  }

  .accordion-button:not(.collapsed)::after {
    transform: rotate(-180deg);
  }

  .accordion-button.collapsed {
    background-color: #f9f9f9;
  }

  .accordion-button:not(.collapsed) {
    color: #e53935; /* Rojo al abrir */
  }

  .accordion-collapse {
    border-top: 1px solid #e0e0e0;
  }

  .accordion-body {
    padding: 15px 20px;
  }

  .link_producto {
    font-family: 'Roboto', sans-serif;
    font-size: 16px;
    font-weight: 400;
    line-height: 1.6;
    text-decoration: none !important;
    color: #495057;
    display: block;
    padding: 8px 10px;
    transition: color 0.3s ease;
  }

  .link_producto:hover {
    color: #e53935; /* Rojo al hover */
    background-color: #f0f0f0;
    border-radius: 5px;
  }

  .link_familia {
    font-family: 'Roboto', sans-serif;
    font-size: 18px;
    text-decoration: none !important;
    color: #333;
    transition: color 0.3s ease;
  }

  .link_familia:hover {
    color: #e53935; /* Rojo al hover */
  }

  .familia_active {
    background-color: #f0f8ff; /* Azul muy claro al estar activo */
    border-radius: 8px 8px 0 0;
    border: none;
    width: 100%;
    padding: 15px 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .familia_active a {
    font-family: 'Roboto', sans-serif;
    font-size: 18px;
    color: #333 !important;
    text-decoration: none;
  }

  .familia_active a:hover,
  .familia_active a:focus {
    color: #e53935 !important;
  }

  .familia_active .accordion-button::after {
    background-color: #333 !important;
  }

</style>
<div class="d-flex flex-column">
  <div class="accordion" id="accordionCategorias">
    <div class="px-3 pb-3">
      <span class="categorias__titulo">
        Categorías
      </span>
    </div>
    
    @foreach ($categorias as $cat_menu)
      @php
        $isActive = $cat_menu->id == $categoria_sel;
        $collapseId = $isActive ? "collapseOne{$cat_menu->id}" : "collapseTwo{$cat_menu->id}";
      @endphp
      <div class="accordion-item">
        <h2 class="accordion-header" id="heading{{ $cat_menu->id }}">
          <button class="{{ $isActive ? 'familia_active border-0' : '' }} accordion-button {{ $isActive ? '' : 'collapsed' }}" 
                  type="button" 
                  data-bs-toggle="collapse" 
                  data-bs-target="#{{ $collapseId }}" 
                  aria-expanded="{{ $isActive ? 'true' : 'false' }}" 
                  aria-controls="{{ $collapseId }}">
            <a class="{{ $isActive ? '' : 'link_familia' }}" href="{{ route('page.categorias', $cat_menu->id) }}">{{ $cat_menu->nombre }}</a>
          </button>
        </h2>
        <div id="{{ $collapseId }}" 
             class="accordion-collapse collapse {{ $isActive ? 'show' : '' }}" 
             aria-labelledby="heading{{ $cat_menu->id }}" 
             data-bs-parent="#accordionCategorias">
          <div class="accordion-body">
            @foreach ($cat_menu->subcategorias()->get() as $prod)
              <div class="ps-2">
                <a class="link_producto" href="{{ route('page.productos', $prod->id) }}">{{ $prod->nombre }}</a>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
