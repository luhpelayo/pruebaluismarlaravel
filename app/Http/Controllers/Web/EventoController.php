<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Evento;
use Storage;
use DB;
class EventoController extends Controller
{
    public function indexInformativa()
    {
        $eventos = DB::table('eventos')->orderBy('event_date', 'desc')->paginate(5);
        $eventosAll = Evento::all();
        $eventosNext = DB::table('eventos')->whereBetween('event_date', [date("Y/m/d"), date("Y/m/d", mktime(0, 0, 0, date("m")+3, date("d"), date("Y")))])->orderBy('event_date', 'asc')->take(5)->get();

        return view('store.eventos' , ['eventos' => $eventos, 'eventosAll' => $eventosAll, 'eventosNext' => $eventosNext, 'eventosActive' => true]);
    }

    public function getFileEvento($id)
    {
        $exists = Storage::disk('evento/archivo')->exists($id);
        if($exists){
          return response()->file(storage_path().'/app/public/eventos/'.$id);
        } else {
          Flash::error(' El archivo no se encuentra en el repositorio. ');
          return $this->indexInformativa();
        }
    }
}
