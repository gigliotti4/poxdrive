<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpresaController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contenido  $contenido
     * @return \Illuminate\Http\Response
     */
    public function show(Contenido $contenido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contenido  $contenido
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contenido = Empresa::find($id);
        return view('adm.empresa.editarcontenido', compact('contenido', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contenido  $contenido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contenido = Empresa::find($id);
        if(!is_null($id))
            $contenido = Empresa::find($id);
        else{
            $contenido          = new Empresa();
            
        }
        if ($request->hasFile('imagen'))
        { 
            $contenido->imagen = $request->file('imagen')->store('public/empresa');
        }

        if ($request->hasFile('imagendos'))
        { 
            $contenido->imagendos = $request->file('imagendos')->store('public/empresa');
        }

        if ($request->hasFile('icono'))
        { 
            $contenido->icono = $request->file('icono')->store('public/empresa');
        }
        if ($request->hasFile('iconodos'))
        { 
            $contenido->iconodos = $request->file('iconodos')->store('public/empresa');
        }
        if ($request->hasFile('iconotres'))
        { 
            $contenido->iconotres = $request->file('iconotres')->store('public/empresa');
        }
       
    
        
        $contenido->texto = $request->texto;
        $contenido->textodos = $request->textodos;
        $contenido->textotres = $request->textotres;
       
        $contenido->titulo = $request->titulo;
        $contenido->descripcion = $request->descripcion;
        $contenido->titulodos = $request->titulodos;
        $contenido->nombre = $request->nombre;
        $contenido->descripciondos = $request->descripciondos;
        $contenido->save();
        return redirect()->route('editarempresa', ['id'=>$id])->with('success', "Registro actualizado exit贸samente" );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contenido  $contenido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contenido $contenido)
    {
        //
    }


}
