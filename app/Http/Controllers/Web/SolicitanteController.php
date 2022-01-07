<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Solicitante;
use Storage;
use DB;
class SolicitanteController extends Controller
{
    public function indexInformativa()
    {
        $solicitantes = DB::table('solicitantes')->orderBy('ci', 'desc')->paginate(6);
        $solicitantesAll = Solicitante::all();
      

        return view('store.solicitantes' , ['solicitantes' => $solicitantes, 'solicitantesAll' => $solicitantesAll, 'solicitantesActive' => true]);
    }

    public function getFileSolicitante($id)
    {
        $exists = Storage::disk('solicitante/archivo')->exists($id);
        if($exists){
          return response()->file(storage_path().'/app/public/solicitantes/'.$id);
        } else {
          Flash::error(' El archivo no se encuentra en el repositorio. ');
          return $this->indexInformativa();
        }
    }
}
