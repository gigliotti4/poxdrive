<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use App\Models\Subcriptores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubcriptoresController extends Controller
{
    public function subscribirse(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subcriptores,email'
        ]);

        $subscriptor = new Subcriptores();
        $subscriptor->email = $request->email;
        $subscriptor->save();

        return response()->json(['message' => 'Se ha suscripto correctamente']);
    }

    public function verSubcriptores()
    {
        $users = Subcriptores::all();
        return view('adm.subscriptores.editarsubcriptores', compact('users'));
    }

    public function create()
    {
        return view('adm.subscriptores.nuevo');
    }

    public function store(Request $request)
    {
        $users = Subcriptores::all();
        $asunto = $request->asunto;
        $body = $request->texto;
        $from = 'noresponder@siwo.com.ar';

        foreach ($users as $user) {
            $to = $user->email;

            Mail::send('emails.masivo',
                ['texto' => $body],
                function ($message) use ($from, $to, $asunto) {
                    $message->from($from);
                    $message->to($to)->subject($asunto);
                }
            );
        }

        return back()->with('success', '¡Mensaje enviado!');
    }
}