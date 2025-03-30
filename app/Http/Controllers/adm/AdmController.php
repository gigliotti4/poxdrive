<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdmController extends Controller
{
    public function __construct()
     {
         $this->middleware('auth');
     }


    public function index()
    {
        return view('adm.index');
    }
}
