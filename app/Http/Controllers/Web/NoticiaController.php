<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Noticia;
use Storage;
use DB;
class NoticiaController extends Controller
{
    public function indexInformativa()
    {
        $noticias = DB::table('noticias')->orderBy('updated_at', 'desc')->paginate(6);
        return view('store.noticias' , ['noticias' => $noticias, 'noticiasActive' => true]);
    }
    

    public function getFileNoticia($id)
    {
        $exists = Storage::disk('noticia/archivo')->exists($id);
        if($exists){
          return response()->file(storage_path().'/app/public/noticias/'.$id);
        } else {
          Flash::error(' El archivo no se encuentra en el repositorio. ');
          return back();
        }
    }
    public function Noticia($id)
    {

        $noticias = Noticia::where('id',$id)->first();
        $notici = DB::table('noticias')->orderBy('updated_at', 'desc')->paginate(3);
    

        return view('store.lanoticia.unanot' , ['unanoti' => $noticias, 'noticias'=>$notici]);
    }

   


}
