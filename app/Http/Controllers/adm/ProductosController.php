<?php

namespace App\Http\Controllers\adm;


use App\Models\{Productos, Categorias, Subcategorias, Prelacionado};

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 
use App\Imports\ProductoMultiSheeImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Productos::orderby('nombre',"ASC")->get(); // Ordenar por nombre en vez de orden
        $categorias = Categorias::orderby('orden',"ASC")->get();
        $subcategorias=Subcategorias::orderby('orden',"ASC")->get();
        return view('adm.productos.contenido', compact('productos', 'categorias','subcategorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $productos = Productos::orderby('nombre',"ASC")->get(); // Ordenar por nombre en vez de orden
        $categorias = Categorias::orderby('orden',"ASC")->get();
        $subcategorias=Subcategorias::orderby('orden',"ASC")->get();
       

        return view('adm.productos.crear', compact('productos', 'subcategorias', 'categorias'));
        
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         //dd($request->all()) ;
        $productos = new Productos();
        if($request->file('imagen')){
            $file = $request->file('imagen');
            $filename = $file->getClientOriginalName();
            $productos->imagen = $file->storeAs('public/productos', $filename);
        }

        if($request->file('pdf')){
            $file = $request->file('pdf');
            $filename = $file->getClientOriginalName();
            $productos->pdf = $file->storeAs('public/productos', $filename);
        }
        
        if($request->hasFile('fichatecnica')){
            $file = $request->file('fichatecnica');
            $filename = $file->getClientOriginalName();
            $productos->fichatecnica = $file->storeAs('public/productos', $filename);
        }
        
        if($request->hasFile('hojaseguridad')){
            $file = $request->file('hojaseguridad');
            $filename = $file->getClientOriginalName();
            $productos->hojaseguridad = $file->storeAs('public/productos', $filename);
        }

        $productos->orden     = $request->orden;
        $productos->nombre = $request->nombre;
        $productos->descripcion     = $request->descripcion;
        $productos->caracteristica     = $request->caracteristica;
        $productos->categoria_id     = $request->categoria_id;
        $productos->subcategoria_id     = $request->subcategoria_id;
        if(isset($request->destacado))
        $productos->destacado    = 1;
        else
        $productos->destacado    = 0;

        if(isset($request->panificadora))
        $productos->panificadora    = 1;
        else
        $productos->panificadora    = 0;

        if(isset($request->alimenticia))
        $productos->alimenticia    = 1;
        else
        $productos->alimenticia    = 0;

        if(isset($request->bebidas))
        $productos->bebidas    = 1;
        else
        $productos->bebidas    = 0;

        if(isset($request->farmaceuticas))
        $productos->farmaceuticas    = 1;
        else
        $productos->farmaceuticas    = 0;

        if(isset($request->metal))
        $productos->metal    = 1;
        else
        $productos->metal    = 0;

        if(isset($request->petrolera))
        $productos->petrolera    = 1;
        else
        $productos->petrolera    = 0;



        $fotos = $request->file('galeria');
        $arrayimg = array(); 
        foreach($fotos as $foto){
            $filename = $foto->getClientOriginalName();
            $galeria = $foto->storeAs('productos', $filename, 'public');
            array_push($arrayimg, $galeria); 
        }
        
        $productos->galeria = implode(',', $arrayimg);
        

        $productos->save();
       
        if(isset($request->productos)){
            foreach ($request->productos as $value) {
                
                $prelacion = new Prelacionado();
                $prelacion->productos_id = $productos->id;
                $prelacion->relacion_id = $value;
                
                $prelacion->save();
            }
        }
 

        return redirect()->route('productos')->with('success', 'La productos fue creada');

    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $productos = Productos::find($id);
        $prods = Productos::orderby('nombre', 'ASC')->get(); // Ordenar por nombre en vez de obtener todos sin orden
        $categorias = Categorias::orderby('orden',"ASC")->get();
        $subcategorias=Subcategorias::orderby('orden',"ASC")->get();

        return view('adm.productos.editar', compact('productos', 'subcategorias', 'prods', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $productos = Productos::find($id);


        if($request->file('imagen')){
            $file = $request->file('imagen');
            $filename = $file->getClientOriginalName();
            $productos->imagen = $file->storeAs('public/productos', $filename);
        }
      

        if($request->file('pdf')){
            $file = $request->file('pdf');
            $filename = $file->getClientOriginalName();
            $productos->pdf = $file->storeAs('public/productos', $filename);
        }
        
        if($request->hasFile('fichatecnica')){
            $file = $request->file('fichatecnica');
            $filename = $file->getClientOriginalName();
            $productos->fichatecnica = $file->storeAs('public/productos', $filename);
        }
        
        if($request->hasFile('hojaseguridad')){
            $file = $request->file('hojaseguridad');
            $filename = $file->getClientOriginalName();
            $productos->hojaseguridad = $file->storeAs('public/productos', $filename);
        }

        $productos->orden     = $request->orden;
        $productos->nombre = $request->nombre;
        $productos->descripcion     = $request->descripcion;
        $productos->caracteristica     = $request->caracteristica;
        $productos->categoria_id     = $request->categoria_id;
        $productos->subcategoria_id     = $request->subcategoria_id;
      
        
        $fotos = $request->file('galeria');

        $arrayimg = array(); 

        if ($request->hasFile('galeria') )
        { 
            $imgdelete = explode(',', $productos->galeria);
            foreach($fotos as $foto){
                $filename = $foto->getClientOriginalName();
                $galeria = $foto->storeAs('productos', $filename, 'public');
                array_push($arrayimg, $galeria); 
            }
            $productos->galeria = $productos->galeria . ','. implode(',', $arrayimg);
        }

        if(isset($request->destacado))
        $productos->destacado    = 1;
        else
        $productos->destacado    = 0;

        if(isset($request->panificadora))
        $productos->panificadora    = 1;
        else
        $productos->panificadora    = 0;

        if(isset($request->alimenticia))
        $productos->alimenticia    = 1;
        else
        $productos->alimenticia    = 0;

        if(isset($request->bebidas))
        $productos->bebidas    = 1;
        else
        $productos->bebidas    = 0;

        if(isset($request->farmaceuticas))
        $productos->farmaceuticas    = 1;
        else
        $productos->farmaceuticas    = 0;

        if(isset($request->metal))
        $productos->metal    = 1;
        else
        $productos->metal    = 0;
    
        if(isset($request->petrolera))
        $productos->petrolera    = 1;
        else
        $productos->petrolera    = 0;

        $productos->update();


        $delete = Prelacionado::where('productos_id', $productos->id)->delete();

        // dd($request->productos);
        if(isset($request->productos)){
         foreach ($request->productos as $value) {
             
             $prelacion = new Prelacionado();
             $prelacion->productos_id = $productos->id;
             $prelacion->relacion_id = $value;
             
             $prelacion->save();
         }
        }
        

        return redirect()->route('productos')->with('success', 'actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productos = productos::find($id); 
        $productos->delete();
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
        
        return back()->with('message', 'Importación de productos completada');
    }


    public function borrarprod($id, $img)
    {
        $productos = Productos::find($id);
        $explode = explode(',', $productos->galeria);
        unset($explode[$img]);
        $productos->galeria = implode(',', $explode);
        $productos->save();
        return redirect()->back();
          
    }
    
    public function duplicar($id)
    {
        // Obtener el producto original por su ID
        $productoOriginal = Productos::findOrFail($id);

        // Clonar el producto
        $nuevoProducto = $productoOriginal->replicate();

        // Modificar algunos campos si es necesario
        $nuevoProducto->nombre = $productoOriginal->nombre . ' (Copia)';
        // Puedes ajustar otros campos seg��n tus necesidades

        // Guardar el nuevo producto clonado
        $nuevoProducto->save();

        // Clonar las relaciones (si es necesario)
        $relaciones = Prelacionado::where('productos_id', $id)->get();
        foreach ($relaciones as $relacion) {
            $nuevaRelacion = $relacion->replicate();
            $nuevaRelacion->productos_id = $nuevoProducto->id;
            $nuevaRelacion->save();
        }

        return redirect()->route('productos')->with('success', 'Producto duplicado correctamente.');
    }
    
    /**
     * Elimina un documento específico (pdf, ficha técnica o hoja de seguridad) de un producto
     *
     * @param int $id ID del producto
     * @param string $tipo Tipo de documento (pdf, fichatecnica, hojaseguridad)
     * @return \Illuminate\Http\RedirectResponse
     */
    public function eliminarDocumento($id, $tipo)
    {
        $producto = Productos::findOrFail($id);
        
        // Verificar qué tipo de documento eliminar
        if ($tipo === 'pdf' && $producto->pdf) {
            // Eliminar el archivo del almacenamiento
            Storage::delete(str_replace('public/', '', $producto->pdf));
            // Actualizar el registro en la base de datos
            $producto->pdf = null;
        } 
        elseif ($tipo === 'fichatecnica' && $producto->fichatecnica) {
            Storage::delete(str_replace('public/', '', $producto->fichatecnica));
            $producto->fichatecnica = null;
        } 
        elseif ($tipo === 'hojaseguridad' && $producto->hojaseguridad) {
            Storage::delete(str_replace('public/', '', $producto->hojaseguridad));
            $producto->hojaseguridad = null;
        }
        
        // Guardar los cambios
        $producto->save();
        
        return redirect()->back()->with('success', 'Documento eliminado correctamente');
    }

}
