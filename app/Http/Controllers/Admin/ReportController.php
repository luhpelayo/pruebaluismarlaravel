<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index()
    {

       //$academico = Academico::all();
        //dd($academico);
        return view('index');
    }
}
