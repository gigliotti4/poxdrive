<?php

namespace App\Http\Controllers\adm;
use App\Http\Controllers\Controller;

use App\Models\Categoria;
use App\Models\CategoriaNovedades;
use App\Models\Novedad;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Contacto;
use App\Models\IconosPie;
use App\Models\ImagenPrincipal;
use App\Models\Logos;
use App\Models\SeccionEmpresa;
class NovedadesController extends Controller
{
    public function editarNovedades(){
      
     $categorias=CategoriaNovedades::orderby('orden',"ASC")->get();
    $novedades=Novedad::orderby('orden',"ASC")->get();
    //    $dia=$fecha->format('d');
    //    echo("el mes es". $mes. "y el dia es ".$dia );
     return view('adm.novedades.editarnovedades',compact('categorias','novedades'));
    }
    public function agregarCategoriaNovedad(Request $request){
        $categoria=new CategoriaNovedades($request->all());
        $categoria->save();
    }
    public function editarCategoriaNovedad($id){
        $categoria=CategoriaNovedades::find($id);
        return $categoria;
    }
    public function actualizarCategoriaNovedad(Request $request,$id){
        $categoria=CategoriaNovedades::find($id);
        $categoria->update($request->all());
    }
    public function eliminarCategoriaNovedad($id){
        $categoria=CategoriaNovedades::find($id);
        $categoria->delete();
    }
    public function agregarNovedad(Request $request){
        $novedad= new Novedad($request->all());
  
        if($archivo=$request->file('imgNovedad')){
            //$nombre=$request->titulo.".".$archivo->getClientOriginalExtension();
            $nombre="img_novedad".time().".".$archivo->getClientOriginalExtension();
            $archivo->move('images/novedades',$nombre);
            $novedad->imagen=$nombre;
        }
   
        $novedad->orden = $request->orden;

        $novedad->save();
    }
    public function editarNovedad($id){
        $novedad=Novedad::find($id);
        return $novedad;
    }
    public function actualizarNovedad(Request $request,$id){
        $novedad=Novedad::find($id);
        $data = $request->all();
        if($archivo=$request->file('imgNovedad')){
            //$nombre=$request->titulo.".".$archivo->getClientOriginalExtension();
            $nombre="img_novedad".time().".".$archivo->getClientOriginalExtension();
            $archivo->move('images/novedades',$nombre);
            $novedad->imagen=$nombre;
        }
        $novedad->update($request->all());
    }
    public function eliminarNovedad($id){
        $novedad=Novedad::find($id);
        $novedad->delete();
    }
   
   
}
