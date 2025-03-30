<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use App\Models\Metadato;
use Illuminate\Http\Request;

class MetadatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metadatos = Metadato::all();
        return view('adm.metadatos.contenido', compact('metadatos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adm.metadatos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'seccion' => 'required',
            'keyword' => 'required',
            'descripcion' => 'required',
        ]);

        $metadato = new Metadato();
        $metadato->seccion = $request->seccion;
        $metadato->keyword = $request->keyword;
        $metadato->descripcion = $request->descripcion;
        $metadato->save();

        return redirect()->route('metadatos')->with('success', 'Metadatos agregados correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $metadato = Metadato::find($id);
        return view('adm.metadatos.editar', compact('metadato'));
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
        $request->validate([
            'seccion' => 'required',
            'keyword' => 'required',
            'descripcion' => 'required',
        ]);

        $metadato = Metadato::find($id);
        $metadato->seccion = $request->seccion;
        $metadato->keyword = $request->keyword;
        $metadato->descripcion = $request->descripcion;
        $metadato->update();

        return redirect()->route('metadatos')->with('success', 'Metadatos actualizados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $metadato = Metadato::find($id);
        $metadato->delete();
        return redirect()->back()->with('danger', 'Registro eliminado exitosamente');
    }
}
