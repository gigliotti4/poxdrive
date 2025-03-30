<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\Categorias;
use App\Models\Subcategorias;
use App\Models\Familia;
use App\Models\Item;
use Illuminate\Http\Response;
use Carbon\Carbon;

class SitemapController extends Controller
{
    /**
     * Genera el sitemap XML principal
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now()->toAtomString();
        
        return response()->view('sitemap.index', [
            'now' => $now
        ])->header('Content-Type', 'text/xml');
    }

    /**
     * Genera un sitemap específico para las páginas estáticas
     *
     * @return \Illuminate\Http\Response
     */
    public function estaticas()
    {
        $now = Carbon::now()->toAtomString();
        
        return response()->view('sitemap.estaticas', [
            'now' => $now
        ])->header('Content-Type', 'text/xml');
    }

    /**
     * Genera un sitemap específico para productos
     *
     * @return \Illuminate\Http\Response
     */
    public function productos()
    {
        $productos = Productos::orderBy('updated_at', 'desc')->get();
        
        return response()->view('sitemap.productos', [
            'productos' => $productos
        ])->header('Content-Type', 'text/xml');
    }

    /**
     * Genera un sitemap específico para categorías
     * 
     * @return \Illuminate\Http\Response
     */
    public function categorias()
    {
        $categorias = Categorias::all();
        
        return response()->view('sitemap.categorias', [
            'categorias' => $categorias
        ])->header('Content-Type', 'text/xml');
    }

    /**
     * Genera un sitemap específico para subcategorías
     * 
     * @return \Illuminate\Http\Response
     */
    public function subcategorias()
    {
        $subcategorias = Subcategorias::all();
        
        return response()->view('sitemap.subcategorias', [
            'subcategorias' => $subcategorias
        ])->header('Content-Type', 'text/xml');
    }

    /**
     * Genera un sitemap específico para familias
     * 
     * @return \Illuminate\Http\Response
     */
    public function familias()
    {
        $familias = Familia::all();
        
        return response()->view('sitemap.familias', [
            'familias' => $familias
        ])->header('Content-Type', 'text/xml');
    }

    /**
     * Genera un sitemap específico para items
     * 
     * @return \Illuminate\Http\Response
     */
    public function items()
    {
        $items = Item::all();
        
        return response()->view('sitemap.items', [
            'items' => $items
        ])->header('Content-Type', 'text/xml');
    }
}
