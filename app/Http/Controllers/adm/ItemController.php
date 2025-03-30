<?php

namespace App\Http\Controllers\adm;
use App\Models\Item;
use App\Models\Familia;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::get();
        return view('adm.items.contenido', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $items = Item::all();
        $familias = Familia::all();
       

        return view('adm.items.crear', compact('items', 'familias'));
        
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $items = new Item();
        if($request->file('imagen')){
            $file = $request->file('imagen');
            $filename = $file->getClientOriginalName();
            $items->imagen = $file->storeAs('public/items', $filename);
        }
        
        if($request->file('pdf')){
            $file = $request->file('pdf');
            $filename = $file->getClientOriginalName();
            $items->pdf = $file->storeAs('public/items', $filename);
        }
        $items->orden     = $request->orden;
        $items->nombre = $request->nombre;
        $items->descripcion     = $request->descripcion;
        
        $items->familia_id = $request->familia_id;
        
        
        
        
        $fotos = $request->file('galeria');
        $arrayimg = array(); 
        foreach($fotos as $foto){
            $filename = $foto->getClientOriginalName();
            $galeria = $foto->storeAs('items', $filename, 'public');
            array_push($arrayimg, $galeria); 
        }
        
        $items->galeria = implode(',', $arrayimg);
        
        
        // if(isset($request->destacado))
        // $items->destacado    = 1;
        // else
        // $items->destacado    = 0;
        
        // if(isset($request->descuento))
        // $items->descuento    = 1;
        // else
        // $items->descuento    = 0;
        
        
        $items->save();
      

      

        return redirect()->route('items')->with('success', 'La items fue creada');

    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\items  $items
     * @return \Illuminate\Http\Response
     */
    public function show(items $items)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\items  $items
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $items = Item::find($id);
        $familias = Familia::orderby('nombre',"ASC")->get();
      //  $adicional = Adicional::where('items_id', $id)->get();

        return view('adm.items.editar', compact('items', 'familias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\items  $items
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
           $items = Item::find($id);


        if($request->file('imagen')){
            $file = $request->file('imagen');
            $filename = $file->getClientOriginalName();
            $items->imagen = $file->storeAs('public/items', $filename);
        }
    

        if($request->file('pdf')){
            $file = $request->file('pdf');
            $filename = $file->getClientOriginalName();
            $items->pdf = $file->storeAs('public/items', $filename);
        }

        $items->orden     = $request->orden;
        $items->nombre = $request->nombre;
     
        $items->descripcion     = $request->descripcion;
        
        $items->familia_id = $request->familia_id;
        
        $fotos = $request->file('galeria');

        $arrayimg = array(); 

        if ($request->hasFile('galeria') )
        { 
            $imgdelete = explode(',', $items->galeria);
            foreach($fotos as $foto){
                $filename = $foto->getClientOriginalName();
                $galeria = $foto->storeAs('items', $filename, 'public');
                array_push($arrayimg, $galeria); 
            }
            $items->galeria =$items->galeria . ','. implode(',', $arrayimg);
        }

        // if(isset($request->destacado))
        // $items->destacado    = 1;
        // else
        // $items->destacado    = 0;

        // if(isset($request->descuento))
        // $items->descuento    = 1;
        // else
        // $items->descuento    = 0;

        $items->update();

      
       
     
        

        return redirect()->route('items')->with('success', 'actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\items  $items
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = Item::find($id); 
        $items->delete();
        return redirect()->back()->with('danger', "Registro eliminado exitósamente" ); 
    }
    
    public function importexcel(Request $request){
        // Validar que el archivo sea de tipo Excel
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv|max:10240',
        ], [
            'file.required' => 'Debe seleccionar un archivo',
            'file.mimes' => 'El archivo debe ser de tipo Excel (xlsx, xls, csv)',
            'file.max' => 'El archivo no debe superar los 10MB',
        ]);
        
        $file = $request->file('file');
        Excel::import(new ProductoMultiSheeImport, $file);
        
        return back()->with('message', 'Importación de items completada');
    }

    public function borraritem($id, $img)
    {
        $items = Item::find($id);
        $explode = explode(',', $items->galeria);
        unset($explode[$img]);
        $items->galeria = implode(',', $explode);
        $items->save();
        return redirect()->back();
          
    }

}
