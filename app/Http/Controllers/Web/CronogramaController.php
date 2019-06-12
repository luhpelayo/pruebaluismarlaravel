<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cronograma;
use Storage;
use DB;
class CronogramaController extends Controller
{
    public function indexInformativa()
    {
        $cronogramas = DB::table('cronogramas')->orderBy('cronog_date', 'desc')->paginate(5);
        $cronogramasAll = Cronograma::all();
        $cronogramasNext = DB::table('cronogramas')->whereBetween('cronog_date', [date("Y/m/d"), date("Y/m/d", mktime(0, 0, 0, date("m")+3, date("d"), date("Y")))])->orderBy('cronog_date', 'asc')->take(5)->get();

        return view('store.cronogramas' , ['cronogramas' => $cronogramas, 'cronogramasAll' => $cronogramasAll, 'cronogramasNext' => $cronogramasNext, 'cronogramasActive' => true]);
    }

    public function getFileCronograma($id)
    {
        $exists = Storage::disk('cronograma/archivo')->exists($id);
        if($exists){
          return response()->file(storage_path().'/app/public/cronogramas/'.$id);
        } else {
          Flash::error(' El archivo no se encuentra en el repositorio. ');
          return $this->indexInformativa();
        }
    }
}
