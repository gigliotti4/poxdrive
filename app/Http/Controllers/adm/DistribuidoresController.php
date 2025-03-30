<?php

namespace App\Http\Controllers\adm;
use App\Models\Distribuidores;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DistribuidoresController extends Controller
{
    public function index()
    {
        $distribuidores = Distribuidores::orderBy('orden', 'ASC')->get();
        return view('adm.distribuidores.contenido', compact('distribuidores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $distribuidores = Distribuidores::get();
        return view('adm.distribuidores.crear', compact('distribuidores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $distribuidores = new Distribuidores;
        $distribuidores->orden = $request->orden;
        $distribuidores->empresa = $request->empresa;
        $distribuidores->direccion = $request->direccion;
        $distribuidores->telefono = $request->telefono;
        $distribuidores->mail = $request->mail;
   
        $distribuidores->save();


        return redirect()->route('distribuidores')->with('success', 'El distribuidores fue creado');
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
        $distribuidores = Distribuidores::find($id);
        return view('adm.distribuidores.editar', compact('distribuidores'));
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
        $distribuidores = Distribuidores::find($id);
        $distribuidores->orden = $request->orden;
        $distribuidores->empresa = $request->empresa;
        $distribuidores->direccion = $request->direccion;
        $distribuidores->telefono = $request->telefono;
        $distribuidores->mail = $request->mail;
        $distribuidores->save();
        return redirect()->route('distribuidores')->with('success', "Registro actualizado exitósamente" );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $distribuidores = Colore::find($id);
        $distribuidores->delete();
        return redirect()->back()->with('danger', "Registro eliminado exitósamente" );
    }
}
