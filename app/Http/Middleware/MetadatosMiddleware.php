<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Metadato;
use Illuminate\Support\Facades\View;

class MetadatosMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Determinar la sección actual basada en la URL
        $path = $request->path();
        $seccion = 'home'; // Por defecto
        
        // Mapeo de rutas a secciones
        if ($path === '/' || $path === '') {
            $seccion = 'home';
        } // else if ($path === 'empresa') {
        //     $seccion = 'empresa';
        // } else if ($path === 'colores') {
        //     $seccion = 'colores';
        // } else if ($path === 'aplicaciones') {
        //     $seccion = 'aplicaciones';
        // } else if ($path === 'distribuidores') {
        //     $seccion = 'distribuidores';
        // } else if ($path === 'galerias' || strpos($path, 'galeria/') === 0 || strpos($path, 'galerias/') === 0) {
        //     $seccion = 'galerias';
        // } else if ($path === 'usos' || strpos($path, 'uso/') === 0) {
        //     $seccion = 'usos';
        // } else if ($path === 'familias') {
        //     $seccion = 'familias';
        // } else if (strpos($path, 'items/') === 0 || strpos($path, 'item/') === 0) {
        //     $seccion = 'items';
        // } else if ($path === 'categorias') {
        //     $seccion = 'categorias';
        // } else if (strpos($path, 'subcategorias/') === 0) {
        //     $seccion = 'subcategorias';
        // } else if (strpos($path, 'productos/') === 0 || strpos($path, 'producto/') === 0) {
        //     $seccion = 'productos';
        // } else if ($path === 'presupuesto') {
        //     $seccion = 'presupuesto';
        // } else if ($path === 'contacto') {
        //     $seccion = 'contacto';
        // }
        
        // Buscar metadatos para la sección actual
        $metadatos = Metadato::where('seccion', $seccion)->first();
        
        // Si no hay metadatos específicos para esta sección, usar metadatos por defecto
        if (!$metadatos) {
            $metadatos = Metadato::where('seccion', 'home')->first();
        }
        
        // Si aún no hay metadatos, crear un objeto vacío para evitar errores
        if (!$metadatos) {
            $metadatos = new Metadato();
            $metadatos->keyword = 'poxdrive, default keywords';
            $metadatos->descripcion = 'Descripción por defecto para poxdrive';
            $metadatos->seccion = 'default';
        }
        
        // Compartir los metadatos con todas las vistas
     //   View::share('metadatos', $metadatos);
        
        return $next($request);
    }
}
