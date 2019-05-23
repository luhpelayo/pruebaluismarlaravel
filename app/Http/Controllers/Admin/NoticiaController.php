<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Noticia;
use App\Models\User;
use Storage;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $noticia = Noticia::all();

        return view('admin.noticias.index',compact('noticia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.noticias.create');
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
        
        ]);
      
        $noticia=new Noticia;
        $noticia->title=$request->get('title');
        $noticia->content=$request->get('content');
      
        if($request->auth !== null) {
          $noticia->auth= $request->auth;
        } else {
           $noticia->auth= \Auth::user()->name;
        }
      
        $noticia->user_id= \Auth::user()->id;
   
        $file= $request->file('file');
        if($file != null) {
          $file_route = time().'_'.$file->getClientOriginalName();
            
          if(Storage::disk('noticia/archivo')->put($file_route, file_get_contents($file->getRealPath()))) {
            $noticia->url_document= $file_route;
          } else {
            Flash::error(' Error al guardar el archivo en los noticias. ');
          }
        }
        
        $img= $request->file('img');
        if($img != null) {
          $img_route = time().'_'.$img->getClientOriginalName();

          if(Storage::disk('noticia/img')->put($img_route, file_get_contents($img->getRealPath()))){
            $noticia->url_img= $img_route;
          } else {
            Flash::error(' Error al guardar la imagen en los noticias. ');
          }
        }


        $noticia->save();
         $message = $noticia ? 'noticia agregado correctamente!' : 'noticia NO pudo agregarse!';
        
        return redirect()->route('noticias.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Noticia $noticia)
    {
        return $noticia;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Noticia $noticia)
    {
        return view('admin.noticias.edit', compact('noticia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Noticia $noticia,Request $request)
    {
    
        $this->validate($request, [
                   'title'      => 'required',
                   'content'    => 'required',
             ]);
         
          $noticia->title= $request->title;
          $noticia->content= $request->content;

          $file= $request->file('file');

          if($file != null) {
            $file_route = time().'_'.$file->getClientOriginalName();

            if(Storage::disk('noticia/archivo')->put($file_route, file_get_contents($file->getRealPath()))){
              Storage::disk('noticia/archivo')->delete($noticia->url_document);
              $noticia->url_document= $file_route;
            } else {
              Flash::error(' Error al guardar el archivo en las noticias. ');
            }
          }

         $img= $request->file('img');
          if($img != null) {
            $img_route = time().'_'.$img->getClientOriginalName();

            if(Storage::disk('noticia/img')->put($img_route, file_get_contents($img->getRealPath()))){
              Storage::disk('noticia/img')->delete($noticia->url_img);
              $noticia->url_img= $img_route;
            } else {
              Flash::error(' Error al guardar la imagen en las noticias. ');
            }
          }
    
         $updated = $noticia->save();
         $message = $updated ? 'Noticia actualizado correctamente!' : 'La noticia NO pudo actualizarse!';
        
        return redirect()->route('noticias.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noticia $noticia)
    {
      
          $deleted = $noticia->delete();

          if($deleted == true){
            Storage::disk('noticia/archivo')->delete($noticia->url_document);

            Storage::disk('noticia/img')->delete($noticia->url_img);
                      
          } else {
            Flash::error(' Error al eliminar la noticia. ');
          }
        
        $message = $deleted ? 'Noticia eliminado correctamente!' : 'La Noticia NO pudo eliminarse!';
        
        return redirect()->route('noticias.index')->with('message', $message);
    }
}
