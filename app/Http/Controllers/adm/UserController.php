<?php



namespace App\Http\Controllers\adm;



use App\Http\Controllers\Controller;

use App\Models\User;

use App\Models\Clienteslogin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Hash;



class UserController extends Controller

{

    public function index()

    {

        $usuarios = User::orderBy('id', 'ASC')->get();

        return view('adm.usuario.index', compact('usuarios'));

    }



    public function create(){

        return view('adm.usuario.crear');

    }



    public function store(Request $request)

    {

        $user = new User($request->all());

        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->route('usuarios')->with('success', "Usuario registrado exitósamente" );

    }



    public function edit($id){

        $usuarios         = User::find($id);

        return view('adm.usuario.editar', compact('usuarios'));

    }



    public function update(Request $request, $id){

        $user           = User::find($id);

     

        if ($request->password){

            $user->password = Hash::make($request->password);

        }else{

            $user->password = $user->password;

        }



        $user->update($request->all());

        return redirect()->route('usuarios')->with('success', "Usuario actualizado exitósamente" );

    }



    public function destroy($id){

        $user = User::find($id);

        $user->delete();

        return redirect()->route('usuarios')->with('danger', "Usuario eliminado exitósamente" );

    }















    public function indexzp()

    {

        $usuarios = Clienteslogin::orderBy('id', 'ASC')->get();

        return view('adm.clienteslogin.index', compact('usuarios'));

    }



    public function createzp(){

        return view('adm.clienteslogin.crear');

    }



    public function storezp(Request $request)

    {

        $user = new Clienteslogin ();

        $user->username = $request->username;
        // $user->cliente = $request->cliente;
       $user->descuento    = $request->descuento;
        $user->email    = $request->email;
       
        $user->estado  = $request->estado;

   

        $user->password = Hash::make($request->password);



         // mail


        // Mail::send('emails.registro',
        // array(  
        //     'cliente' => $user,
        // ), function($message) use ($from, $to, $asunto)
        // {
        // $message->from('gigliottilucas4@gmail.com');
        // $message->to('lucas@gmail.com')->subject('Se registro un nuevo usuario.');
        // });

        $user->save();

        return redirect()->route('clienteslogin')->with('success', "Usuario registrado exitósamente" );

    }



    public function editzp($id){

        $usuarios         = Clienteslogin::find($id);

        return view('adm.clienteslogin.editar', compact('usuarios'));

    }



    public function updatezp(Request $request, $id){

        $user = Clienteslogin::find($id);

        // $user->username = $request->username;
        // $user->cliente = $request->cliente;
        // $user->descuento    = $request->descuento;
        $user->email = $request->email;
        $user->estado = $request->estado;

        

       

        if ($request->password){

            $user->password = Hash::make($request->password);

        }else{

            $user->password = $user->password;

        }



        $user->update();

        return redirect()->route('clienteslogin')->with('success', "Usuario actualizado exitósamente" );

    }



    public function destroyzp($id){

        $user = Clienteslogin::find($id);

        $user->delete();

        return redirect()->route('clienteslogin')->with('danger', "Usuario eliminado exitósamente" );

    }

}

