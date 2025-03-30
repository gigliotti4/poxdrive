<?php

namespace App\Http\Controllers\adm;

use App\Models\Categorias;
use App\Models\Subcategorias;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubcategoriasController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategorias=Subcategorias::orderby('orden',"ASC")->get();
        
        return view('adm.subcategorias.contenido',compact('subcategorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=Categorias::orderby('orden',"ASC")->get();
        return view('adm.subcategorias.crear',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $subcategorias= new Subcategorias();
        $subcategorias->orden = $request->orden;
        $subcategorias->nombre = $request->nombre;
        $subcategorias->categoria_id = $request->categoria_id;
        if($request->file('imagen')){
            $subcategorias->imagen = $request->file('imagen')->store('public/subcategorias');
            }
      
         $subcategorias->save();
           
            return redirect()->route('subcategorias')->with('success', 'La Subfamilia fue creada');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategorias=Subcategorias::find($id);
        $categorias=Categorias::orderby('orden',"ASC")->get();
        
        return view('adm.subcategorias.editar',compact('subcategorias','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subcategorias= Subcategorias::find($id);
      
     

        $subcategorias->orden     = $request->orden;
        $subcategorias->nombre = $request->nombre;
        $subcategorias->categoria_id = $request->categoria_id;
        if($request->file('imagen')){
            $subcategorias->imagen = $request->file('imagen')->store('public/subcategorias');
            }
        $subcategorias->save();
        return redirect()->route('subcategorias')->with('success', "Registro actualizado exitósamente" );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategorias=Subcategorias::find($id);
       // if($subcategorias->productos()->get()->isEmpty()){
            Storage::delete($subcategorias->imagen);
            $subcategorias->delete();
            return redirect()->back()->with('danger', "Registro eliminado exitósamente" );
      //  }else{
        //    return redirect()->back()->with('danger', "Registro eliminado exitósamente" );
       // }
    }
}
