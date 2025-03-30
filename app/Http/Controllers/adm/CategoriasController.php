<?php


namespace App\Http\Controllers\adm;
use App\Models\Categorias;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categorias::get();
        return view('adm.categorias.contenido', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categorias::orderBy('orden', 'ASC')->get();
        return view('adm.categorias.crear', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categorias = new Categorias;
        $categorias->orden = $request->orden;
        $categorias->nombre = $request->nombre;
        if($request->file('imagen')){
            $categorias->imagen = $request->file('imagen')->store('public/categorias');
            }
        
        
        $categorias->save();


        return redirect()->route('categorias')->with('success', 'La categorias fue creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function show(Categorias $categorias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorias = Categorias::find($id);

        return view('adm.categorias.editar', compact('categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categorias = categorias::find($id);    
        $categorias->orden     = $request->orden;
        $categorias->nombre = $request->nombre;
    
        if($request->file('imagen')){
            $categorias->imagen = $request->file('imagen')->store('public/categorias');
            }
        
            $categorias->save();
        return redirect()->route('categorias')->with('success', "Registro actualizado exitósamente" );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorias = Categorias::find($id); 
        $categorias->delete();
        return redirect()->back()->with('danger', "Registro eliminado exitósamente" ); 
    }
}
