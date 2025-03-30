<?php

namespace App\Http\Controllers\adm;
use App\Models\Uso;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsoController extends Controller
{
    public function index()
    {
        $usos = Uso::orderBy('orden', 'ASC')->get();
        return view('adm.usos.contenido', compact('usos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usos = Uso::get();
        return view('adm.usos.crear', compact('usos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usos = new Uso;
        $usos->orden     = $request->orden;
        $usos->rol = $request->rol;
        $usos->nombre = $request->nombre;
        $usos->youtube = $request->youtube;
        if($request->file('pdf')){    
            $usos->pdf = $request->file('pdf')->storeAs('public/usos', $request->file('pdf')->getClientOriginalName());
        }
        if($request->file('videos')){    
            $usos->videos = $request->file('videos')->storeAs('public/usos', $request->file('videos')->getClientOriginalName());
        }
        $usos->save();


        return redirect()->route('usos')->with('success', 'El usos fue creado');
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
        $usos = Uso::find($id);
        return view('adm.usos.editar', compact('usos'));
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
        $usos = Uso::find($id);
        $usos->orden     = $request->orden;
        $usos->rol = $request->rol;
        $usos->nombre = $request->nombre;
        $usos->youtube = $request->youtube;
        if($request->file('pdf')){    
            $usos->pdf = $request->file('pdf')->storeAs('public/usos', $request->file('pdf')->getClientOriginalName());
        }
        if($request->file('videos')){    
            $usos->videos = $request->file('videos')->storeAs('public/usos', $request->file('videos')->getClientOriginalName());
        }
        $usos->save();
        return redirect()->route('usos')->with('success', "Registro actualizado exitósamente" );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usos = Uso::find($id);
        $usos->delete();
        return redirect()->back()->with('danger', "Registro eliminado exitósamente" );
    }
}
