<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tramite;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recibido_count = Tramite::where('estado_id',1)->get()->count();

        $derivado_count = Tramite::where('estado_id',2)->get()->count();
         
        $terminado_count = Tramite::where('estado_id',4)->get()->count();
        $noterminado_count = Tramite::where('estado_id',5)->get()->count();
        return view('admin.home',compact('recibido_count','derivado_count','noterminado_count','terminado_count'));
       
    }
}
