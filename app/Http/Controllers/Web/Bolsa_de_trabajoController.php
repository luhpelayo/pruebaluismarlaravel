<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bolsa_de_trabajo;
use Storage;
use DB;
class Bolsa_de_trabajoController extends Controller
{
    public function indexInformativa()
    {
       $bolsa_de_trabajos = DB::table('bolsa_de_trabajos')->orderBy('event_date', 'desc')->paginate(6);
        $bolsa_de_trabajosAll = Bolsa_de_trabajo::all();
        $bolsa_de_trabajosNext = DB::table('bolsa_de_trabajos')->whereBetween('event_date', [date("Y/m/d"), date("Y/m/d", mktime(0, 0, 0, date("m")+3, date("d"), date("Y")))])->orderBy('event_date', 'asc')->take(5)->get();

        return view('store.bolsa_de_trabajos' , ['bolsa_de_trabajos' => $bolsa_de_trabajos, 'bolsa_de_trabajosAll' => $bolsa_de_trabajosAll, 'bolsa_de_trabajosNext' => $bolsa_de_trabajosNext, 'bolsa_de_trabajosActive' => true]);
    }

    public function getFileBolsa_de_trabajo($id)
    {
        $exists = Storage::disk('bolsa_de_trabajo/archivo')->exists($id);
        if($exists){
          return response()->file(storage_path().'/app/public/bolsa_de_trabajos/'.$id);
        } else {
          Flash::error(' El archivo no se encuentra en el repositorio. ');
          return $this->indexInformativa();
        }
    }
}
