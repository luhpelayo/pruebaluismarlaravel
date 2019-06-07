<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Trabajo;
use Storage;

class ProcedController extends Controller
{
    public function getProced()
    {
    	$procedimientos = Procedimiento::orderBy('created_at', 'desc')->paginate(5);
       
        return view('store.procedim' , ['procedimientos' => $procedimientos, 'procedimientosActive' => true]);
    }

    public function Proced($id)
    {

        $procedimientos = Procedimiento::where('id',$id)->first();


        return view('store.procedimiento.procedim' , ['procedimientos' => $procedimientos]);
    }

     public function getFileProc($id)
    {
        $exists = Storage::disk('procedimiento/archivo')->exists($id);

        if($exists){
          return response()->file(storage_path().'/app/public/procedimientos/'.$id);
        } else {
          Flash::error(' El archivo no se encuentra en el repositorio. ');
          return back();
        }
    }
}
