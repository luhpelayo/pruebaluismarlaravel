<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveDerivacionRequest;
use App\Models\Tramite;
use App\Models\Area;
use App\Models\Derivacion;


use App\Models\Solicitante;
use App\Models\User;
use App\Models\Estado;
use App\Models\Process;
use App\Models\Archivo;
use App\Models\Reception;
use App\Models\Despacho;
use DB;

class DerivacionController extends Controller
{   

    



    public function index($idTram)
    {
        $tramite = Tramite::find($idTram);
        $areas = Area::orderBy('descripcion', 'ASC')->pluck('descripcion','id');
        return view('admin.tramite.derivacion', compact('tramite','areas'));
         
    }

    public function setDetalle(SaveDerivacionRequest $request,$id)
    {

        $derivacion =new Derivacion;
        $derivacion->tramite_id=$id;
        $derivacion->area_id=$request->get('area_id');
        $areaen='1';
        // dd($areaen);
        // exit; 
        $derivacion->observacion=$request->get('observacion');
        
            //     dd($derivacion);
            //  exit; 

        if ($derivacion->area_id==$areaen){
             
          $user=\Auth::user()->id;
  
          
          $area_id= DB::table('users')->where('id', $user)->value('area_id');

          // dd($area_id);
          // exit;
          $area= DB::table('areas')->where('id', $area_id)->value('descripcion');
          
           
              $tramite=Tramite::find($id);
              $solicitantes = Solicitante::orderBy('id', 'desc')->pluck('ci', 'id');
              $process = Process::orderBy('id', 'desc')->pluck('descripcion', 'id');
              $estados = Estado::orderBy('id', 'desc')->pluck('estado', 'id');
              
              return view('admin.tramite.cierredeestados', compact('tramite','solicitantes','process','estados'));
  
  
  
  
          


        } else {
        
        if ($derivacion->save()) {
  
          $estado = DB::table('estados')->where('estado', 'Derivado')->value('id'); 
          $tramite = Tramite::find($id);
          $tramite->estado_id=$estado;
          $tramite->tipo='Derivado';
          
            //  dd($tramite);
            //  exit; 
          $tramite->save();    
               
        }
         
        
         $message = $derivacion ? 'Tramite derivado correctamente!' : 'Tramite NO pudo ser derivado!';
         return redirect()->route('tramite.index')->with('message', $message);
    }

    
    }
}
