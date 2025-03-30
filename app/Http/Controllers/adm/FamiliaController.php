<?php
namespace App\Http\Controllers\adm;
use App\Models\Familia;
use App\Models\Sproyectos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FamiliaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $familias = Familia::get();
        return view('adm.familias.contenido', compact('familias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $familias = Familia::orderBy('orden', 'ASC')->get();
        return view('adm.familias.crear', compact('familias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $familias = new Familia;
        $familias->orden = $request->orden;
        $familias->nombre     = $request->nombre;
       
        if($request->file('imagen')){
            $familias->imagen = $request->file('imagen')->store('public/familias');
            }
        

        
        $familias->save();

        
    //     if (is_array($request->proyectos ) || is_object($request->proyectos ))
    //     {
    //     foreach ($request->proyectos as $value) {
            
    //         $pproyectos = new Sproyectos();
    //         $pproyectos->proyectos_id = $familias->id;
    //         $pproyectos->categorias_id = $value;
            
    //         $pproyectos->save();
    //     }
    // }

        


        return redirect()->route('familias')->with('success', 'La categoria fue creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\familias  $familias
     * @return \Illuminate\Http\Response
     */
    public function show(familias $familias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\familias  $familias
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $familias = Familia::find($id);

        return view('adm.familias.editar', compact('familias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\familias  $familias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $familias = Familia::find($id);    
        $familias->orden     = $request->orden;
        $familias->nombre     = $request->nombre;
        if($request->file('imagen')){
            $familias->imagen = $request->file('imagen')->store('public/familias');
            }
       
         
            
            $familias->save();


        //     $delete = Sproyectos::where('categorias_id', $familias->id)->delete();
        //    // dd($delete);
        //    if (is_array($request->proyectos ) || is_object($request->proyectos ))
        //    {
        //     foreach ($request->proyectos as $value) {
                
        //         $pproyectos = new Sproyectos();
        //         $pproyectos->categorias_id = $familias->id;
        //         $pproyectos->proyectos_id = $value;
                
        //         $pproyectos->save();
                
        //     }
     //      }
        return redirect()->route('familias')->with('success', "Registro actualizado exitósamente" );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\familias  $familias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $familias = Familia::find($id); 
        $familias->delete();
        return redirect()->back()->with('danger', "Registro eliminado exitósamente" ); 
    }
}
