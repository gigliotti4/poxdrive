<?php

namespace App\Http\Controllers\adm;
use App\Models\Colores;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ColoresController extends Controller
{
    public function index()
    {
        $colores = Colores::orderBy('orden', 'ASC')->get();
        return view('adm.colores.contenido', compact('colores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colores = Colores::get();
        return view('adm.colores.crear', compact('colores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $colores = new Colores;
        $colores->orden = $request->orden;
        $colores->colores = $request->colores;
        $colores->nombre = $request->nombre;
   
        $colores->save();


        return redirect()->route('colores')->with('success', 'El colores fue creado');
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
        $colores = Colores::find($id);
        return view('adm.colores.editar', compact('colores'));
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
        $colores = Colores::find($id);
        $colores->colores = $request->colores;

        $colores->nombre = $request->nombre;
        $colores->orden     = $request->orden;
        $colores->save();
        return redirect()->route('colores')->with('success', "Registro actualizado exitósamente" );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $colores = Colore::find($id);
        $colores->delete();
        return redirect()->back()->with('danger', "Registro eliminado exitósamente" );
    }
}
