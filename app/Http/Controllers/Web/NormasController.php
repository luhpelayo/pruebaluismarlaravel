<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Norma;
use Storage;
use DB;

class NormasController extends Controller
{
    public function getNormaInterna()
    {
    	$extermas = DB::table('normas')->where('tipo_norma', 'EXTERNO')->get();
  
        $normas = DB::table('normas')->where('tipo_norma', 'INTERNA')->get();
   
       
        return view('store.normas' , ['normas' => $normas,'extermas' => $extermas]);
    }


    public function getFileNorma($id)
    {
        $exists = Storage::disk('norma/archivo')->exists($id);
        if($exists){
          return response()->file(storage_path().'/app/public/normas/'.$id);
        } else {
          Flash::error(' El archivo no se encuentra en el repositorio. ');
          return back();
        }
    } 
}
