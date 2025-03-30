<?php

namespace App\Http\Controllers;
use App\Models\CategoriaNovedades;
use App\Models\Novedad;
use App\Models\Distribuidores;
use App\Models\Colores;
use App\Models\Contacto;
use App\Models\Rede;
use App\Models\Empresa;
use App\Models\Contenido;
use App\Models\Slider;
use App\Models\Productos;
use App\Models\Uso;
use App\Models\Logo;
use App\Models\Categorias;
use App\Models\Inicio;
use App\Models\Subcategorias;
use App\Models\Image;
use App\Models\Familia;
use App\Models\Item;
use App\Models\Metadato;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;



class PageController extends Controller

{

    public function index(){

        $active = 'page.inicio';

        $menu = 'web';
        $sliders   = Slider::where('seccion', 'inicio')->orderBy('orden', 'ASC')->get();
        $logosheader = Logo::where('seccion', 'header')->orderBy('id', 'ASC')->get();
        $logosfooter = Logo::find(2);
        $inicio = Inicio::find(1);
        $categorias = Categorias::orderBy('orden', 'ASC')->get();
        $productos = Productos::orderBy('orden', 'ASC')->where('destacado',1)->get();
        $contactos = Contacto::orderBy('orden', 'ASC')->get();
        $redes = Rede::get();
        
        $metadatos = Metadato::where('seccion', 'home')->first() ?? [
            'titulo' => 'Inicio',
            'descripcion' => 'Página de inicio',
            'keywords' => 'inicio, poxdrive',
            'seccion' => 'home'
        ];

       return view('page.inicio', compact('sliders', 'logosheader','logosfooter', 'contactos', 'active', 'redes', 'menu', 'inicio', 'categorias', 'productos', 'metadatos'));
    }

    public function empresa(){

        $active = 'page.empresa';
        $menu = 'web';
        $sliders   = Slider::where('seccion', 'empresa')->orderBy('orden', 'ASC')->get();
        $logosheader = Logo::where('seccion', 'header')->orderBy('id', 'ASC')->get();
        $logosfooter = Logo::find(2);
        $empresa = Empresa::find(1);
        $contactos = Contacto::orderBy('orden', 'ASC')->get();

        $redes = Rede::get();
        $metadatos = Metadato::where('seccion', 'empresa')->first() ?? [
            'titulo' => 'Empresa',
            'descripcion' => 'Información sobre nuestra empresa',
            'keywords' => 'empresa, poxdrive, nosotros',
            'seccion' => 'empresa'
        ];

       return view('page.empresa', compact('sliders', 'logosheader','logosfooter', 'contactos', 'active', 'empresa', 'redes', 'menu', 'metadatos'));



    }

    public function categorias(){

        $active = 'page.categorias';
        $menu = 'web';
        $sliders   = Slider::where('seccion', 'categorias')->orderBy('orden', 'ASC')->get();
        $logosheader = Logo::where('seccion', 'header')->orderBy('id', 'ASC')->get();
        $logosfooter = Logo::find(2);
        $categorias = Categorias::orderBy('orden', 'ASC')->get();
        $productos = Productos::orderBy('orden', 'ASC')->get();
        $contactos = Contacto::orderBy('orden', 'ASC')->get();
        $redes = Rede::get();
        $metadatos = Metadato::where('seccion', 'categorias')->first() ?? [
            'titulo' => 'Categorías',
            'descripcion' => 'Nuestras categorías de productos',
            'keywords' => 'categorías, productos, poxdrive',
            'seccion' => 'categorias'
        ];

       return view('page.categorias', compact('sliders', 'logosheader','logosfooter', 'contactos', 'active', 'categorias', 'redes', 'menu', 'productos', 'metadatos'));



    }

    public function subcategorias($cat){
        $active = 'page.categorias';
        $menu = 'web';
        $logosheader = Logo::where('seccion', 'header')->orderBy('id', 'ASC')->get();
        $logosfooter = Logo::find(2);
        $categorias=Categorias::orderby('orden',"ASC")->get();
        $subcategorias=Subcategorias::orderby('orden',"ASC")->get();
        $productos=Productos::orderby('orden',"ASC")->get();
        $categoria=Categorias::find($cat);
        $categoria_sel=$categoria->id;
        $prodsel=null;
        $subcatsel=null; 
        $contactos = Contacto::orderBy('orden', 'ASC')->get();
        
        $subsubcatsel=null;
        $redes = Rede::get();
        $metadatos = Metadato::where('seccion', 'subcategorias')->first() ?? [
            'titulo' => $categoria->titulo,
            'descripcion' => 'Subcategorías de productos',
            'keywords' => 'subcategorías, productos, poxdrive',
            'seccion' => 'subcategorias'
        ];

       return view('page.subcategorias', compact('contactos','logosheader','logosfooter','categorias','categoria','categoria_sel','subcatsel','prodsel','productos', 'active','subsubcatsel', 'cat', 'subcategorias', 'metadatos'));



    }
    
    public function productos($id){
        $active = 'page.categorias';
        $menu = 'web';
        $sliders = Slider::where('seccion', 'productos')->orderBy('orden', 'ASC')->get();
        $logosheader = Logo::where('seccion', 'header')->orderBy('id', 'ASC')->get();
        $logosfooter = Logo::find(2);
        
        // Obtener la subcategoría
        $subcategoria = Subcategorias::find($id);
        
        // Obtener productos relacionados con la subcategoría
        $productos = $subcategoria->productosrelacionados()->get();
        
        // Obtener correctamente el ID de la categoría padre
        $categoria_sel = $subcategoria->categoria_id;
        
        // Cargar la categoría padre completa
        $categoria = Categorias::find($categoria_sel);
        
        // Obtener todas las categorías para el menú
        $categorias = Categorias::orderBy('orden', 'ASC')->get();
        
        $contactos = Contacto::orderBy('orden', 'ASC')->get();
        $redes = Rede::get();
        $metadatos = Metadato::where('seccion', 'productos')->first() ?? [
            'titulo' => 'Productos',
            'descripcion' => 'Listado de productos',
            'keywords' => 'productos, poxdrive',
            'seccion' => 'productos'
        ];

        return view('page.productos', compact(
            'sliders', 'logosheader', 'logosfooter', 'categorias', 'contactos',
            'active', 'productos', 'redes', 'categoria_sel', 'menu', 
            'subcategoria', 'metadatos', 'categoria'
        ));
    }

    public function producto($id){

        $active = 'page.categorias';

        $menu = 'web';

        $sliders   = Slider::where('seccion', 'productos')->orderBy('orden', 'ASC')->get();
        $logosheader = Logo::where('seccion', 'header')->orderBy('id', 'ASC')->get();
        $logosfooter = Logo::find(2);
        $categorias = Categorias::orderBy('orden', 'ASC')->get();
        $producto = Productos::find($id);
        
        // Verificar que el producto existe
        if (!$producto) {
            return redirect()->route('page.categorias')->with('error', 'El producto solicitado no existe.');
        }
        
        $productos = Productos::where('categoria_id', '=', $producto->categoria_id)
                    ->orderBy('nombre', 'ASC') // Ordenar por nombre en vez de orden
                    ->get();
        
        // Verificar si existe la categoría antes de buscarla
        $categoria = null;
        if ($producto->categoria_id) {
            $categoria = Categorias::find($producto->categoria_id);
        }
        
        $categoria_sel = $producto->categoria_id;
        $contactos = Contacto::orderBy('orden', 'ASC')->get();
        $redes = Rede::get();
        
        $metadatos = Metadato::where('seccion', 'productos')->first() ?? [
            'titulo' => $producto->nombre ?? 'Producto',
            'descripcion' => $producto->descripcion ?? 'Detalle del producto',
            'keywords' => 'producto, detalle, poxdrive',
            'seccion' => 'productos'
        ];

        return view('page.producto', compact('sliders', 'logosheader','logosfooter', 'contactos', 'active', 'producto', 'redes', 'productos', 'categoria_sel', 'categorias', 'menu','categoria', 'metadatos'));



    }

    public function familias(){

        $active = 'page.familias';
        $menu = 'web';
        $sliders   = Slider::where('seccion', 'familias')->orderBy('orden', 'ASC')->get();
        $logosheader = Logo::where('seccion', 'header')->orderBy('id', 'ASC')->get();
        $logosfooter = Logo::find(2);
        $familias = Familia::orderBy('orden', 'ASC')->get();
        $items = Item::orderBy('orden', 'ASC')->get();
        $contactos = Contacto::orderBy('orden', 'ASC')->get();
        $redes = Rede::get();
        $metadatos = Metadato::where('seccion', 'familias')->first() ?? [
            'titulo' => 'Familias',
            'descripcion' => 'Nuestras familias de productos',
            'keywords' => 'familias, productos, poxdrive',
            'seccion' => 'familias'
        ];

       return view('page.familias', compact('sliders', 'logosheader','logosfooter', 'contactos', 'active', 'familias', 'redes', 'menu', 'items', 'metadatos'));



    }

    public function items($id){

        $active = 'page.familias';
        $menu = 'web';

        $sliders   = Slider::where('seccion', 'items')->orderBy('orden', 'ASC')->get();
        $logosheader = Logo::where('seccion', 'header')->orderBy('id', 'ASC')->get();
         $logosheaderdos = Logo::find(3);
        $logosfooter = Logo::find(2);
        $familia_sel = $id;
        $familia=Familia::find($id);
        $familias = Familia::orderBy('orden', 'ASC')->get();
        $items = Item::where('familia_id', $id)->orderBy('orden', 'ASC')->get();
        $item = Item::find($id);
        $contactos = Contacto::orderBy('orden', 'ASC')->get();

        $redes = Rede::find(1);
        $metadatos = Metadato::where('seccion', 'items')->first() ?? [
            'titulo' => 'Ítems',
            'descripcion' => 'Listado de ítems',
            'keywords' => 'ítems, productos, poxdrive',
            'seccion' => 'items'
        ];

       return view('page.items', compact('sliders', 'logosheader','logosfooter', 'contactos', 'active', 'items', 'redes', 'menu', 'logosheaderdos', 'familia_sel', 'familia', 'familias', 'familias', 'items', 'item', 'metadatos'));



    }

    public function item($id){

        $active = 'page.familias';

        $menu = 'web';
        $inicio = Inicio::find(1);
        $sliders   = Slider::where('seccion', 'items')->orderBy('orden', 'ASC')->get();
        
        // Primero definimos el item
        $item = Item::find($id);
        
        // Ahora podemos usar el item para obtener familia_sel
        $familia_sel = $item->familia_id;
        
        $contactos = Contacto::orderBy('orden', 'ASC')->get();
        $redes = Rede::find(1);
        $logosheader = Logo::where('seccion', 'header')->orderBy('id', 'ASC')->get();
        $logosfooter = Logo::find(2);
        $logosheaderdos = Logo::find(3);
        $familia = Familia::find($item->familia_id);
        $familias = Familia::orderBy('orden', 'ASC')->get();
        $items = Item::where('familia_id', $item->familia_id)->orderBy('orden', 'ASC')->get();
        
        $metadatos = Metadato::where('seccion', 'items')->first() ?? [
            'titulo' => 'Ítems',
            'descripcion' => 'Listado de ítems',
            'keywords' => 'ítems, productos, poxdrive',
            'seccion' => 'items'
        ];
       return view('page.item', compact('sliders', 'logosheader','logosfooter', 'contactos', 'active', 'redes', 'item', 'menu', 'logosheaderdos', 'inicio','familia_sel', 'familia', 'familias', 'familias', 'items', 'item', 'metadatos'));



    }

    public function aplicaciones(){
        $active = 'page.aplicaciones';
        $logosheader = Logo::where('seccion', 'header')->orderBy('id', 'ASC')->get();
        $logosfooter = Logo::where('seccion', 'footer')->orderBy('id', 'ASC')->get();
        $sliders   = Slider::where('seccion', 'aplicaciones')->orderBy('orden', 'ASC')->get();
        $panificadora = Productos::orderBy('orden', 'ASC')->where('panificadora',1)->get();
        $farmaceuticas = Productos::orderBy('orden', 'ASC')->where('farmaceuticas',1)->get();
        $metal = Productos::orderBy('orden', 'ASC')->where('metal',1)->get();
        $alimenticia = Productos::orderBy('orden', 'ASC')->where('alimenticia',1)->get();
        $petrolera = Productos::orderBy('orden', 'ASC')->where('petrolera',1)->get();
        $bebidas = Productos::orderBy('orden', 'ASC')->where('bebidas',1)->get();
        $contactos = Contacto::orderBy('orden', 'ASC')->get();
        $redes = Rede::get();
        $metadatos = Metadato::where('seccion', 'aplicaciones')->first() ?? [
            'titulo' => 'Aplicaciones',
            'descripcion' => 'Aplicaciones de nuestros productos',
            'keywords' => 'aplicaciones, productos, poxdrive',
            'seccion' => 'aplicaciones'
        ];

       return view('page.aplicaciones', compact('logosheader','logosfooter', 'contactos', 'redes', 'active', 'farmaceuticas', 'sliders', 'panificadora', 'metal', 'alimenticia', 'petrolera', 'bebidas', 'metadatos'));

    }

    public function usos(){

        $active = 'page.usos';
        $menu = 'web';
       
        $logosheader = Logo::where('seccion', 'header')->orderBy('id', 'ASC')->get();
        $logosfooter = Logo::find(2);
        $usospdf = Uso::orderBy('orden', 'ASC')->where('rol', 'pdf')->get();
        $usosvideos = Uso::orderBy('orden', 'ASC')->where('rol', 'video')->get();
        $contactos = Contacto::orderBy('orden', 'ASC')->get();
        $redes = Rede::get();
        $metadatos = Metadato::where('seccion', 'usos')->first() ?? [
            'titulo' => 'Usos',
            'descripcion' => 'Usos de nuestros productos',
            'keywords' => 'usos, productos, poxdrive',
            'seccion' => 'usos'
        ];
       return view('page.usos', compact('logosheader','logosfooter', 'contactos', 'active', 'usospdf', 'redes', 'menu', 'usosvideos', 'metadatos'));
    }
    
    public function usoDescargar($id){
        $uso = Uso::findOrFail($id);
        if($uso->pdf)
            return response()->download(Storage::disk('uso')->url($uso->pdf));
        else
            return back();
    }
    
    public function distribuidores(){

        $active = 'page.distribuidores';
        $menu = 'web';
       
        $logosheader = Logo::where('seccion', 'header')->orderBy('id', 'ASC')->get();
        $logosfooter = Logo::find(2);
        $distribuidores = Distribuidores::orderBy('orden', 'ASC')->get();
        $contactos = Contacto::orderBy('orden', 'ASC')->get();
        $redes = Rede::get();
        $metadatos = Metadato::where('seccion', 'distribuidores')->first() ?? [
            'titulo' => 'Distribuidores',
            'descripcion' => 'Nuestros distribuidores',
            'keywords' => 'distribuidores, poxdrive',
            'seccion' => 'distribuidores'
        ];
       return view('page.distribuidores', compact('logosheader','logosfooter', 'contactos', 'active', 'distribuidores', 'redes', 'menu', 'metadatos'));
    }

    public function vistaNovedades(){
        $active = 'page.novedades';
        $menu = 'web';
        $contactos=Contacto::all();
        $logosheader = Logo::where('seccion', 'header')->orderBy('id', 'ASC')->get();
        $logosfooter = Logo::find(2);
        $ultimas_novedades=Novedad::orderby('orden',"ASC")->get();
        $novedades=Novedad::orderby('orden',"ASC")->get();
        $categorias=CategoriaNovedades::orderby('orden',"ASC")->get();
        $redes = Rede::get();
        $metadatos = Metadato::where('seccion', 'novedades')->first() ?? [
            'titulo' => 'Novedades',
            'descripcion' => 'Últimas novedades',
            'keywords' => 'novedades, noticias, poxdrive',
            'seccion' => 'galerias'
        ];
        return view('page.novedades',compact('active','categorias','ultimas_novedades','contactos','logosheader','logosfooter','novedades', 'redes', 'menu', 'metadatos'));
    }
    
    public function vistaNovedad($id){
       
        $active = 'page.novedades';
        $menu = 'web';
        $novedad=Novedad::find($id);
        $categoria_sel  = $novedad->id;
        $contactos=Contacto::all(); 
        $logosheader = Logo::where('seccion', 'header')->orderBy('id', 'ASC')->get();
        $logosfooter = Logo::find(2);
 
        
        $categorias=CategoriaNovedades::orderby('orden',"ASC")->get();
        $redes = Rede::get();
        
        // Metadatos personalizados para la novedad específica
        $metadatos = Metadato::where('seccion', 'novedades')->first() ?? [
            'titulo' => 'Categoría de novedades',
            'descripcion' => 'Novedades por categoría',
            'keywords' => 'novedades, categoría, poxdrive',
            'seccion' => 'galerias'
        ];
        return view('page.novedad',compact('active','novedad','categorias','contactos','logosheader','logosfooter', 'redes', 'menu', 'categoria_sel', 'metadatos'));
    }
   
    public function vistaPorCategoria($id){
        $active = 'page.novedades';
        $menu = 'web';
        $categoria_sel = $id;
        $novedades=Novedad::where('category_id',$id)->orderby('orden',"ASC")->get();
        $contactos=Contacto::all();
        $logosheader = Logo::where('seccion', 'header')->orderBy('id', 'ASC')->get();
        $logosfooter = Logo::find(2);
        
        $categorias=CategoriaNovedades::orderby('orden',"ASC")->get();
        $redes = Rede::get();
        $metadatos = Metadato::where('seccion', 'novedades')->first() ?? [
            'titulo' => 'Categoría de novedades',
            'descripcion' => 'Novedades por categoría',
            'keywords' => 'novedades, categoría, poxdrive',
            'seccion' => 'Galerias'
        ];
        return view('page.novedadesporCategoria',compact('active','novedades','categorias','contactos','logosheader','logosfooter', 'redes', 'menu', 'categoria_sel', 'metadatos'));
    }

    public function colores(){

        $active = 'page.colores';
        $menu = 'web';
        $logosheader = Logo::where('seccion', 'header')->orderBy('id', 'ASC')->get();
        $logosfooter = Logo::find(2);
        //$etiquetas = Etiqueta::orderBy('orden', 'ASC')->get();
        $colores = Colores::orderBy('orden', 'ASC')->get();
        $redes = Rede::get();
        $contactos=Contacto::all();
        $metadatos = Metadato::where('seccion', 'colores')->first() ?? [
            'titulo' => 'Colores',
            'descripcion' => 'Nuestros colores disponibles',
            'keywords' => 'colores, poxdrive',
            'seccion' => 'colores'
        ];

       return view('page.colores', compact('logosheader', 'logosfooter', 'colores', 'active', 'redes', 'menu', 'contactos', 'metadatos'));

    }

    public function contactos(){

        $active = 'page.contactos';
        $menu = 'web';
        $logosheader = Logo::where('seccion', 'header')->orderBy('id', 'ASC')->get();
        $logosfooter = Logo::find(2);
        //$etiquetas = Etiqueta::orderBy('orden', 'ASC')->get();
        $contactos = Contacto::orderBy('orden', 'ASC')->get();

        $redes = Rede::get();
        $metadatos = Metadato::where('seccion', 'contactos')->first() ?? [
            'titulo' => 'Contactos',
            'descripcion' => 'Contacta con nosotros',
            'keywords' => 'contactos, poxdrive',
            'seccion' => 'contactos'
        ];

       return view('page.contacto', compact('logosheader', 'logosfooter', 'contactos', 'active', 'redes', 'menu', 'metadatos'));



    }


}

