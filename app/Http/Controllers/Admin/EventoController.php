<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveEventoRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\Evento;
use App\Mail\EmailSend;
use App\Models\User;
use App\Models\Contact;
use File;
use Session;
use Storage;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evento = Evento::all();

        return view('admin.eventos.index',compact('evento'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.eventos.create');
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
            'content'    => 'required',
            'event_date' => 'required',
            'lugar'      => 'required',
           
        ]);
      
        $evento=new Evento;
        $evento->title=$request->get('title');
        $evento->content=$request->get('content');
        $evento->event_date=$request->get('event_date');
        $evento->lugar=$request->get('lugar');

        if($request->get('org') !== '') {
          $evento->org= $request->get('org');

        } else {
          $evento->org= Auth::user()->name;
        }
        $evento->user_id= \Auth::user()->id;
   
        $file= $request->file('file');
        if($file != null) {
          $file_route = time().'_'.$file->getClientOriginalName();
            
          if(Storage::disk('evento/archivo')->put($file_route, file_get_contents($file->getRealPath()))) {
            $evento->url_document= $file_route;
          } else {
            Flash::error(' Error al guardar el archivo en los eventos. ');
          }
        }
        
        $img= $request->file('img');
        if($img != null) {
          $img_route = time().'_'.$img->getClientOriginalName();

          if(Storage::disk('evento/img')->put($img_route, file_get_contents($img->getRealPath()))){
            $evento->url_img= $img_route;
          } else {
            Flash::error(' Error al guardar la imagen en los eventos. ');
          }
        }


        $evento->save();
         $message = $evento ? 'Evento agregado correctamente!' : 'Evento NO pudo agregarse!';

        $receivers = Contact::pluck('email');
        $name= "mensaje enviado Correctamente";
        Mail::to($receivers)->send(new EmailSend($name));

        return redirect()->route('eventos.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function show(Evento $evento)
    {
        return $evento;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Evento $evento)
    {
        return view('admin.eventos.edit', compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Evento $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Evento $evento,Request $request)
    {
    
        $this->validate($request, [
                   'title'      => 'required',
                   'content'    => 'required',
                   'event_date' => 'required',
                   'lugar'      => 'required',
             ]);
         
          $evento->title= $request->title;
          $evento->content= $request->content;
          $evento->event_date= $request->event_date;
          $evento->lugar= $request->lugar;

          $file= $request->file('file');

          if($file != null) {
            $file_route = time().'_'.$file->getClientOriginalName();

            if(Storage::disk('evento/archivo')->put($file_route, file_get_contents($file->getRealPath()))){
              Storage::disk('evento/archivo')->delete($evento->url_document);
              $evento->url_document= $file_route;
            } else {
              Flash::error(' Error al guardar el archivo en las eventos. ');
            }
          }

         $img= $request->file('img');
          if($img != null) {
            $img_route = time().'_'.$img->getClientOriginalName();

            if(Storage::disk('evento/img')->put($img_route, file_get_contents($img->getRealPath()))){
              Storage::disk('evento/img')->delete($evento->url_img);
              $evento->url_img= $img_route;
            } else {
              Flash::error(' Error al guardar la imagen en las eventos. ');
            }
          }
    
         $updated = $evento->save();
         $message = $updated ? 'Evento actualizado correctamente!' : 'El evento NO pudo actualizarse!';
        
        return redirect()->route('eventos.index')->with('message', $message);
    }

    /**
     * Delete the specified resource in storage.
     * @param Evento $evento
     * @return \Illuminate\Http\Response
     */

    public function destroy(Evento $evento)
    {
      
          $deleted = $evento->delete();

          if($deleted == true){
            Storage::disk('evento/archivo')->delete($evento->url_document);

            Storage::disk('evento/img')->delete($evento->url_img);
                      
          } else {
            Flash::error(' Error al eliminar la evento. ');
          }
        
        $message = $deleted ? 'Evento eliminado correctamente!' : 'El evento NO pudo eliminarse!';
        
        return redirect()->route('eventos.index')->with('message', $message);
    }
}
