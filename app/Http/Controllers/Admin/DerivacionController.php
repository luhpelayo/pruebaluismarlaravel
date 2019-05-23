<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveDerivacionRequest;
use App\Models\Tramite;
use App\Models\Area;
use App\Models\Derivacion;
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
        $derivacion->observacion=$request->get('observacion');
        
        if ($derivacion->save()) {

          $estado = DB::table('estados')->where('estado', 'Derivado')->value('id'); 
          $tramite = Tramite::find($id);
          $tramite->estado_id=$estado;
          $tramite->save();    
               
        }

        
         $message = $derivacion ? 'Tramite derivado correctamente!' : 'Tramite NO pudo ser derivado!';
         return redirect()->route('tramite.index')->with('message', $message);
    }
}
