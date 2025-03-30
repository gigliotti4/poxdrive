<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;





/*

|--------------------------------------------------------------------------

| Web Routes

|--------------------------------------------------------------------------

|

| Here is where you can register web routes for your application. These

| routes are loaded by the RouteServiceProvider within a group which

| contains the "web" middleware group. Now create something great!

|

*/



Route::get('/', function () {

    return view('welcome');

});





Route::get('install-storage', function () {

    \Artisan::call('clear-compiled');

    \Artisan::call('cache:clear');

    \Artisan::call('config:clear');

    \Artisan::call('optimize:clear');

    \Artisan::call('route:clear');

    \Artisan::call('view:clear');

    
    $storage_path = storage_path('app/public');

    $public_path = realpath(base_path().'/public_html/poxdrive/public/') . 'storage';

    

    symlink($storage_path, $public_path);



});

Auth::routes();



Route::get('/adm', [App\Http\Controllers\adm\AdmController::class, 'index'])->name('home');



Route::group(['middleware' => 'auth'], function() {

    Route::get('/adm/sliders/{seccion}', [App\Http\Controllers\adm\SliderController::class, 'index'])->name('slider');
    Route::get('/adm/sliders/create/{seccion}', [App\Http\Controllers\adm\SliderController::class, 'create'])->name('nuevoslider');
    Route::post('/adm/sliders/create/{seccion}',[App\Http\Controllers\adm\SliderController::class, 'store'])->name('crearslider');
    Route::get('/adm/sliders/edit/{seccion}/{id}',[App\Http\Controllers\adm\SliderController::class, 'edit'])->name('editslider');
    Route::put('/adm/sliders/update/{seccion}/{id}', [App\Http\Controllers\adm\SliderController::class, 'update'])->name('updateslider');
    Route::get('/adm/sliders/eliminar/{id}', [App\Http\Controllers\adm\SliderController::class, 'destroy'])->name('eliminarslider');



     //Empresa

     Route::get('/adm/empresa/edit/{id}',[App\Http\Controllers\adm\EmpresaController::class, 'edit'])->name('editarempresa');
     Route::put('/adm/empresa/update/{id}', [App\Http\Controllers\adm\EmpresaController::class, 'update'])->name('updateempresa');



     //Empresa

     Route::get('/adm/inicio/edit/{id}',[App\Http\Controllers\adm\InicioController::class, 'edit'])->name('editarinicio');
     Route::put('/adm/inicio/update/{id}', [App\Http\Controllers\adm\InicioController::class, 'update'])->name('updateinicio');


      //Contacto

      Route::get('adm/contacto', [App\Http\Controllers\adm\ContactosController::class, 'index'])->name('contacto');
      Route::get('/adm/contacto/edit/{id}',[App\Http\Controllers\adm\ContactosController::class, 'edit'])->name('editarcontacto');
      Route::put('/adm/contacto/update/{id}', [App\Http\Controllers\adm\ContactosController::class, 'update'])->name('updatecontacto');

 

      //Logos

      Route::get('adm/logos', [App\Http\Controllers\adm\LogosController::class, 'index'])->name('logos');
      Route::get('/adm/logos/edit/{id}',[App\Http\Controllers\adm\LogosController::class, 'edit'])->name('editarlogos');
      Route::put('/adm/logos/update/{id}', [App\Http\Controllers\adm\LogosController::class, 'update'])->name('updatelogos');

 

   //Redes

      Route::get('adm/redes', [App\Http\Controllers\adm\RedesController::class, 'index'])->name('redes');
      Route::get('/adm/redes/edit/{id}',[App\Http\Controllers\adm\RedesController::class, 'edit'])->name('editarredes');
      Route::put('/adm/redes/update/{id}', [App\Http\Controllers\adm\RedesController::class, 'update'])->name('updateredes');



 //Categorias

 Route::get('/adm/colores/', [App\Http\Controllers\adm\ColoresController::class, 'index'])->name('colores');
 Route::get('/adm/colores/create/', [App\Http\Controllers\adm\ColoresController::class, 'create'])->name('nuevocolores');
 Route::post('/adm/colores/create/',[App\Http\Controllers\adm\ColoresController::class, 'store'])->name('crearcolores');
 Route::get('/adm/colores/edit/{id}',[App\Http\Controllers\adm\ColoresController::class, 'edit'])->name('editarcolores');
 Route::put('/adm/colores/update/{id}', [App\Http\Controllers\adm\ColoresController::class, 'update'])->name('updatecolores');
 Route::get('/adm/colores/eliminar/{id}', [App\Http\Controllers\adm\ColoresController::class, 'destroy'])->name('eliminarcolores');

  //Categorias

  Route::get('/adm/distribuidores/', [App\Http\Controllers\adm\DistribuidoresController::class, 'index'])->name('distribuidores');
  Route::get('/adm/distribuidores/create/', [App\Http\Controllers\adm\DistribuidoresController::class, 'create'])->name('nuevodistribuidores');
  Route::post('/adm/distribuidores/create/',[App\Http\Controllers\adm\DistribuidoresController::class, 'store'])->name('creardistribuidores');
  Route::get('/adm/distribuidores/edit/{id}',[App\Http\Controllers\adm\DistribuidoresController::class, 'edit'])->name('editardistribuidores');
  Route::put('/adm/distribuidores/update/{id}', [App\Http\Controllers\adm\DistribuidoresController::class, 'update'])->name('updatedistribuidores');
  Route::get('/adm/distribuidores/eliminar/{id}', [App\Http\Controllers\adm\DistribuidoresController::class, 'destroy'])->name('eliminardistribuidores');
  //Categorias

    Route::get('/adm/usos/', [App\Http\Controllers\adm\UsoController::class, 'index'])->name('usos');
    Route::get('/adm/usos/create/', [App\Http\Controllers\adm\UsoController::class, 'create'])->name('nuevousos');
    Route::post('/adm/usos/create/',[App\Http\Controllers\adm\UsoController::class, 'store'])->name('crearusos');
    Route::get('/adm/usos/edit/{id}',[App\Http\Controllers\adm\UsoController::class, 'edit'])->name('editarusos');
    Route::put('/adm/usos/update/{id}', [App\Http\Controllers\adm\UsoController::class, 'update'])->name('updateusos');
    Route::get('/adm/usos/eliminar/{id}', [App\Http\Controllers\adm\UsoController::class, 'destroy'])->name('eliminarusos');

    //Categorias

    Route::get('/adm/categorias/', [App\Http\Controllers\adm\CategoriasController::class, 'index'])->name('categorias');
    Route::get('/adm/categorias/create/', [App\Http\Controllers\adm\CategoriasController::class, 'create'])->name('nuevocategorias');
    Route::post('/adm/categorias/create/',[App\Http\Controllers\adm\CategoriasController::class, 'store'])->name('crearcategorias');
    Route::get('/adm/categorias/edit/{id}',[App\Http\Controllers\adm\CategoriasController::class, 'edit'])->name('editarcategorias');
    Route::put('/adm/categorias/update/{id}', [App\Http\Controllers\adm\CategoriasController::class, 'update'])->name('updatecategorias');
    Route::get('/adm/categorias/eliminar/{id}', [App\Http\Controllers\adm\CategoriasController::class, 'destroy'])->name('eliminarcategorias');


    
    Route::get('/adm/subcategorias/', [App\Http\Controllers\adm\SubcategoriasController::class, 'index'])->name('subcategorias');
    Route::get('/adm/subcategorias/create/', [App\Http\Controllers\adm\SubcategoriasController::class, 'create'])->name('nuevosubcategorias');
    Route::post('/adm/subcategorias/create/',[App\Http\Controllers\adm\SubcategoriasController::class, 'store'])->name('crearsubcategorias');
    Route::get('/adm/subcategorias/edit/{id}',[App\Http\Controllers\adm\SubcategoriasController::class, 'edit'])->name('editarsubcategorias');
    Route::put('/adm/subcategorias/update/{id}', [App\Http\Controllers\adm\SubcategoriasController::class, 'update'])->name('updatesubcategorias');
    Route::get('/adm/subcategorias/eliminar/{id}', [App\Http\Controllers\adm\SubcategoriasController::class, 'destroy'])->name('eliminarsubcategorias');

  //productos
  Route::get('/adm/productos/', [App\Http\Controllers\adm\ProductosController::class, 'index'])->name('productos');
  Route::get('/adm/productos/create/', [App\Http\Controllers\adm\ProductosController::class, 'create'])->name('nuevoproductos');
  Route::post('/adm/productos/create/',[App\Http\Controllers\adm\ProductosController::class, 'store'])->name('crearproductos');
  Route::get('/adm/productos/edit/{id}',[App\Http\Controllers\adm\ProductosController::class, 'edit'])->name('editarproductos');
  Route::put('/adm/productos/update/{id}', [App\Http\Controllers\adm\ProductosController::class, 'update'])->name('updateproductos');
  Route::get('/adm/productos/eliminar/{id}', [App\Http\Controllers\adm\ProductosController::class, 'destroy'])->name('eliminarproductos');
  Route::get('borrarproducto/{id}/{img}', [App\Http\Controllers\adm\ProductosController::class, 'borrarprod'])->name('borrarproducto');
  Route::get('/adm/productos/eliminar-documento/{id}/{tipo}', [App\Http\Controllers\adm\ProductosController::class, 'eliminarDocumento'])->name('eliminar.documento');
  Route::post('/productos_import_excel', [App\Http\Controllers\adm\ProductosController::class, 'importexcel'])->name('productos_import_excel');
  Route::get('/adm/productos/duplicar/{id}', [App\Http\Controllers\adm\ProductosController::class, 'duplicar'])->name('duplicarproductos');

 //Novedades

 Route::get('adm/novedades/editarNovedades', [App\Http\Controllers\adm\NovedadesController::class, 'editarNovedades'])->name('novedades.editarContenido');
 Route::post('adm/novedades/agregarCategoriaNovedad', [App\Http\Controllers\adm\NovedadesController::class, 'agregarCategoriaNovedad']);
 Route::get('adm/novedades/editarCategoriaNovedad/{id}', [App\Http\Controllers\adm\NovedadesController::class, 'editarCategoriaNovedad']);
 Route::put('adm/novedades/actualizarCategoriaNovedad/{id}', [App\Http\Controllers\adm\NovedadesController::class, 'actualizarCategoriaNovedad']);
 Route::delete('adm/novedades/eliminarCategoriaNovedad/{id}', [App\Http\Controllers\adm\NovedadesController::class, 'eliminarCategoriaNovedad']);
 Route::post('adm/novedades/agregarNovedad',[App\Http\Controllers\adm\NovedadesController::class, 'agregarNovedad']);
 Route::get('adm/novedades/editarNovedad/{id}', [App\Http\Controllers\adm\NovedadesController::class, 'editarNovedad']);
 Route::put('adm/novedades/actualizarNovedad/{id}', [App\Http\Controllers\adm\NovedadesController::class, 'actualizarNovedad']);
 Route::delete('adm/novedades/eliminarNovedad/{id}', [App\Http\Controllers\adm\NovedadesController::class, 'eliminarNovedad']);

   

    //Categorias

    Route::get('/adm/familias/', [App\Http\Controllers\adm\FamiliaController::class, 'index'])->name('familias');
    Route::get('/adm/familias/create/', [App\Http\Controllers\adm\FamiliaController::class, 'create'])->name('nuevofamilias');
    Route::post('/adm/familias/create/',[App\Http\Controllers\adm\FamiliaController::class, 'store'])->name('crearfamilias');
    Route::get('/adm/familias/edit/{id}',[App\Http\Controllers\adm\FamiliaController::class, 'edit'])->name('editarfamilias');
    Route::put('/adm/familias/update/{id}', [App\Http\Controllers\adm\FamiliaController::class, 'update'])->name('updatefamilias');
    Route::get('/adm/familias/eliminar/{id}', [App\Http\Controllers\adm\FamiliaController::class, 'destroy'])->name('eliminarfamilias');

      
    Route::get('/adm/items/', [App\Http\Controllers\adm\ItemController::class, 'index'])->name('items');
    Route::get('/adm/items/create/', [App\Http\Controllers\adm\ItemController::class, 'create'])->name('nuevoitems');
    Route::post('/adm/items/create/',[App\Http\Controllers\adm\ItemController::class, 'store'])->name('crearitems');
    Route::get('/adm/items/edit/{id}',[App\Http\Controllers\adm\ItemController::class, 'edit'])->name('editaritems');
    Route::put('/adm/items/update/{id}', [App\Http\Controllers\adm\ItemController::class, 'update'])->name('updateitems');
    Route::get('/adm/items/eliminar/{id}', [App\Http\Controllers\adm\ItemController::class, 'destroy'])->name('eliminaritems');
    Route::get('borraritem/{id}/{img}', [App\Http\Controllers\adm\ItemController::class, 'borraritem'])->name('borraritem');




      

         //user

         Route::get('/adm/usuarios/', [App\Http\Controllers\adm\UserController::class, 'index'])->name('usuarios');
         Route::get('/adm/usuarios/create/', [App\Http\Controllers\adm\UserController::class, 'create'])->name('nuevousuarios');
         Route::post('/adm/usuarios/create/',[App\Http\Controllers\adm\UserController::class, 'store'])->name('crearusuarios');
         Route::get('/adm/usuarios/edit/{id}',[App\Http\Controllers\adm\UserController::class, 'edit'])->name('editarusuarios');
         Route::put('/adm/usuarios/update/{id}', [App\Http\Controllers\adm\UserController::class, 'update'])->name('updateusuarios');
         Route::get('/adm/usuarios/eliminar/{id}', [App\Http\Controllers\adm\UserController::class, 'destroy'])->name('eliminarusuarios');

     

     

       

         //METADATOS

         Route::get('/adm/metadatos/', [App\Http\Controllers\adm\MetadatoController::class, 'index'])->name('metadatos');
         Route::get('/adm/metadatos/edit/{id}',[App\Http\Controllers\adm\MetadatoController::class, 'edit'])->name('editarmetadatos');
         Route::put('/adm/metadatos/update/{id}', [App\Http\Controllers\adm\MetadatoController::class, 'update'])->name('updatemetadatos');

         // Rutas para metadatos
         Route::get('adm/metadatos', 'adm\MetadatosController@index')->name('metadatos');
         Route::get('adm/metadatos/crear', 'adm\MetadatosController@create')->name('metadatos.crear');
         Route::post('adm/metadatos', 'adm\MetadatosController@store')->name('metadatos.store');
         Route::get('adm/metadatos/editar/{id}', 'adm\MetadatosController@edit')->name('metadatos.editar');
         Route::put('adm/metadatos/{id}', 'adm\MetadatosController@update')->name('metadatos.update');
         Route::delete('adm/metadatos/{id}', 'adm\MetadatosController@destroy')->name('metadatos.eliminar');



         //Subcriptores

	Route::get('Subcriptores', 'adm\SubcriptoresController@verSubcriptores')->name('Subcriptores.view');

	Route::get('home/subscriptores/crearMail','adm\SubcriptoresController@create')->name('subcriptores.create');

	Route::post('home/subscriptores/enviarMail','adm\SubcriptoresController@store')->name('subcriptores.store');

	Route::get('Subcriptores/edit/{id}', 'adm\SubcriptoresController@edit')->name('subscriptores.editar');

	Route::put('Subcriptores/update/{id}', 'adm\SubcriptoresController@update')->name('updateSubcriptores');







        });







  Route::get('/',  [App\Http\Controllers\PageController::class, 'index'])->name('page.inicio');
  Route::get('/empresa',  [App\Http\Controllers\PageController::class, 'empresa'])->name('page.empresa');      
  Route::get('/colores',  [App\Http\Controllers\PageController::class, 'colores'])->name('page.colores');
  Route::get('/aplicaciones',  [App\Http\Controllers\PageController::class, 'aplicaciones'])->name('page.aplicaciones');
  Route::get('/distribuidores',  [App\Http\Controllers\PageController::class, 'distribuidores'])->name('page.distribuidores');
  Route::get('galerias', [App\Http\Controllers\PageController::class, 'vistaNovedades'])->name('page.novedades');
  Route::get('galeria/{id}',[App\Http\Controllers\PageController::class, 'vistaNovedad'])->name('page.novedad');
  Route::get('galerias/{category_id}',[App\Http\Controllers\PageController::class, 'vistaPorCategoria'])->name('page.categoria.novedad');
  Route::get('/usos',  [App\Http\Controllers\PageController::class, 'usos'])->name('page.usos');
  Route::get('/uso/descargar/{id}', [App\Http\Controllers\PageController::class, 'usoDescargar'])->name('page.uso-descargar');
  Route::get('/familias',  [App\Http\Controllers\PageController::class, 'familias'])->name('page.familias');
  Route::get('/items/{id}',  [App\Http\Controllers\PageController::class, 'items'])->name('page.items');
  Route::get('/item/{id}', [App\Http\Controllers\PageController::class, 'item'])->name('page.item');
  Route::get('/categorias',  [App\Http\Controllers\PageController::class, 'categorias'])->name('page.categorias');
  Route::get('/subcategorias/{cat}',  [App\Http\Controllers\PageController::class, 'subcategorias'])->name('page.subcategorias');
  Route::get('/productos/{id}',  [App\Http\Controllers\PageController::class, 'productos'])->name('page.productos');
  Route::get('/producto/{id}', [App\Http\Controllers\PageController::class, 'producto'])->name('page.producto');
  Route::post('/subscribirse', [App\Http\Controllers\adm\SubcriptoresController::class, 'subscribirse'])->name('subscribirse');
  Route::get('presupuesto', [App\Http\Controllers\PresupuestoController::class, 'vistaPresupuesto'])->name('page.presupuesto');
  Route::post('presupuesto', [App\Http\Controllers\PresupuestoController::class, 'presupuesto']);
  Route::get('/contacto',  [App\Http\Controllers\PageController::class, 'contactos'])->name('page.contacto');
  Route::post('/contact', function (Request $request) {

    $request->validate([
        'g-recaptcha-response' => 'required|captcha'
    ]);

    $cfmail = "consultas@poxdrive.com.ar";

    \Mail::send('emails.contact_email',
         array(
             'nombre' => $request->get('nombre'),
             'empresa' => $request->get('empresa'),
             'telefono' => $request->get('telefono'),
             'email' => $request->get('email'),                 
             'mensaje' => $request->get('mensaje'),

         ), function($message) use ($request, $cfmail)

           {
             $message->subject('Consulta');
              $message->to($cfmail);
            });

      return back()->with('success', 'Gracias por comunicarte, te responderemos muy pronto!');

 })->name('enviarmail');


// Rutas de Sitemap
Route::get('/sitemap.xml', [App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap.index');
Route::get('/sitemap-estaticas.xml', [App\Http\Controllers\SitemapController::class, 'estaticas'])->name('sitemap.estaticas');
Route::get('/sitemap-productos.xml', [App\Http\Controllers\SitemapController::class, 'productos'])->name('sitemap.productos');
Route::get('/sitemap-categorias.xml', [App\Http\Controllers\SitemapController::class, 'categorias'])->name('sitemap.categorias');
Route::get('/sitemap-subcategorias.xml', [App\Http\Controllers\SitemapController::class, 'subcategorias'])->name('sitemap.subcategorias');
Route::get('/sitemap-familias.xml', [App\Http\Controllers\SitemapController::class, 'familias'])->name('sitemap.familias');
Route::get('/sitemap-items.xml', [App\Http\Controllers\SitemapController::class, 'items'])->name('sitemap.items');
