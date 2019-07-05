<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveCronogramaRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\Cronograma;
use App\Models\User;
use App\Models\Contact;
use File;
use Session;
use Storage;

class CronogramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cronograma = Cronograma::all();

        return view('admin.cronogramas.index',compact('cronograma'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cronogramas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'title'      => 'required',
            //'cronog_date' => 'required',
            'lugar'      => 'required',
           
        ]);
        date_default_timezone_set('America/La_Paz');
        $fecha_actual=date("Y-m-d");
        $cronograma=new Cronograma;
        $cronograma->title=$request->get('title');
        $cronograma->cronog_date=$fecha_actual;
        $cronograma->lugar=$request->get('lugar');
      //  var_dump($cronograma);
       // exit();
        $cronograma->user_id= \Auth::user()->id;
   
        $file= $request->file('file');
        if($file != null) {
          $file_route = time().'_'.$file->getClientOriginalName();
            
          if(Storage::disk('cronograma/archivo')->put($file_route, file_get_contents($file->getRealPath()))) {
            $cronograma->url_document= $file_route;
          } else {
            Flash::error(' Error al guardar el archivo en los cronogramas. ');
          }
        }
        
        $img= $request->file('img');
        if($img != null) {
          $img_route = time().'_'.$img->getClientOriginalName();

          if(Storage::disk('cronograma/img')->put($img_route, file_get_contents($img->getRealPath()))){
            $cronograma->url_img= $img_route;
          } else {
            Flash::error(' Error al guardar la imagen en los cronogramas. ');
          }
        }


        $cronograma->save();
         $message = $cronograma ? 'Cronograma agregado correctamente!' : 'Cronograma NO pudo agregarse!';

        return redirect()->route('cronogramas.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function show(Cronograma $cronograma)
    {
        return $cronograma;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cronograma $cronograma)
    {
        return view('admin.cronogramas.edit', compact('cronograma'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Cronograma $cronograma
     * @return \Illuminate\Http\Response
     */
    public function update(Cronograma $cronograma,Request $request)
    {
    
        $this->validate($request, [
                   'title'      => 'required',
             //      'cronog_date' => 'required',
                   'lugar'      => 'required',
             ]);
             date_default_timezone_set('America/La_Paz');
             $fecha_actual=date("Y-m-d");
          $cronograma->title= $request->title;
          $cronograma->cronog_date= $fecha_actual;
          $cronograma->lugar= $request->lugar;

          $file= $request->file('file');

          if($file != null) {
            $file_route = time().'_'.$file->getClientOriginalName();

            if(Storage::disk('cronograma/archivo')->put($file_route, file_get_contents($file->getRealPath()))){
              Storage::disk('cronograma/archivo')->delete($cronograma->url_document);
              $cronograma->url_document= $file_route;
            } else {
              Flash::error(' Error al guardar el archivo en las cronogramas. ');
            }
          }

         $img= $request->file('img');
          if($img != null) {
            $img_route = time().'_'.$img->getClientOriginalName();

            if(Storage::disk('cronograma/img')->put($img_route, file_get_contents($img->getRealPath()))){
              Storage::disk('cronograma/img')->delete($cronograma->url_img);
              $cronograma->url_img= $img_route;
            } else {
              Flash::error(' Error al guardar la imagen en las cronogramas. ');
            }
          }
    
         $updated = $cronograma->save();
         $message = $updated ? 'Cronograma actualizado correctamente!' : 'El cronograma NO pudo actualizarse!';
        
        return redirect()->route('cronogramas.index')->with('message', $message);
    }

    /**
     * Delete the specified resource in storage.
     * @param Cronograma $cronograma
     * @return \Illuminate\Http\Response
     */

    public function destroy(Cronograma $cronograma)
    {
      
          $deleted = $cronograma->delete();

          if($deleted == true){
            Storage::disk('cronograma/archivo')->delete($cronograma->url_document);

            Storage::disk('cronograma/img')->delete($cronograma->url_img);
                      
          } else {
            Flash::error(' Error al eliminar la cronograma. ');
          }
        
        $message = $deleted ? 'Cronograma eliminado correctamente!' : 'El cronograma NO pudo eliminarse!';
        
        return redirect()->route('cronogramas.index')->with('message', $message);
    }
}
