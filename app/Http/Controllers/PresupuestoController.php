<?php



namespace App\Http\Controllers;



use App\Mail\Presupuesto;

use App\Models\Contacto;

use App\Models\Productos;

use App\Models\Logo;

use App\Models\Rede;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;



class PresupuestoController extends Controller

{

    public function vistaPresupuesto(){

        $active = 'page.presupuesto';

        $menu = 'web';

        $contactos=Contacto::all();

        $logosheader = Logo::where('seccion', 'header')->orderBy('id', 'ASC')->get();

        $logosfooter = Logo::find(2);
        $productos=Productos::all();
        

        $redes = Rede::get();

        return view('page.presupuesto',compact('contactos','logosheader', 'logosfooter', 'active','redes', 'menu', 'productos'));

        

    

    }

    public function presupuesto( Request $request ) {

        $rules = [

            "nombre" => "required|max:100",

            "email" => "required|email|max:150",

            "mensaje" => "required",

            "file" => "required|mimes:jpeg,png,jpg,gif,txt,doc,docx,xls,xlsx,pdf,zip,rar,7zip|max:2048"

        ];

        

       

         $dataRequest = $request->all();

        

        $file = isset($dataRequest["file"]) ? $request->file('file') : null;

        

            Mail::to( 'soporte@osole.es' )->send( new Presupuesto( $dataRequest , $file ) );

            $obj= new \stdClass();

            $obj->respuesta=false;

            if (count(Mail::failures()) > 0){

                $obj->respuesta=true;

                return json_encode($obj);

            }else{

                return json_encode($obj);

            }

               

       

    }

}

