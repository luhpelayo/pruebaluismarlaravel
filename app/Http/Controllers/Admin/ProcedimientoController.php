<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Procedimiento;
use Storage;
use DB;

class ProcedimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $procedimientos = Procedimiento::all();

        return view('admin.procedimientos.index',compact('procedimientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.procedimientos.create');
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
            'nombre'      => 'required',
            'content'    => 'required',
        
        ]);
        $procedimiento=new Procedimiento;
        $procedimiento->nombre=$request->get('nombre');
        $procedimiento->content=$request->get('content');
      
   
        $file= $request->file('file');
        if($file != null) {
          $file_route = time().'_'.$file->getClientOriginalName();
            
          if(Storage::disk('procedimiento/archivo')->put($file_route, file_get_contents($file->getRealPath()))) {
            $procedimiento->url_document= $file_route;
          } else {
            Flash::error(' Error al guardar el archivo en los procedimientos. ');
          }
        }

        $img= $request->file('img');
        if($img != null) {
          $img_route = time().'_'.$img->getClientOriginalName();

          if(Storage::disk('procedimiento/img')->put($img_route, file_get_contents($img->getRealPath()))){
            $procedimiento->url_img= $img_route;
          } else {
            Flash::error(' Error al guardar la imagen en los procedimientos. ');
          }
        }

        $procedimiento->save();
         $message = $procedimiento ? 'procedimiento agregado correctamente!' : 'procedimiento NO pudo agregarse!';
        
        return redirect()->route('procedimientos.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  Procedimiento  $procedimiento
     * @return \Illuminate\Http\Response
     */
    public function show(Procedimiento $procedimiento)
    {
        return $procedimiento;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Procedimiento $procedimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Procedimiento $procedimiento)
    {
        return view('admin.procedimientos.edit', compact('procedimiento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request  $request
     * @param Procedimiento $procedimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Procedimiento $procedimiento, Request $request)
    {
    
        $this->validate($request, [
                    'nombre'      => 'required',
                    'content'    => 'required',
             ]);
         
          $procedimiento->nombre= $request->nombre;
          $procedimiento->content= $request->content;

          $file= $request->file('file');

          if($file != null) {
            $file_route = time().'_'.$file->getClientOriginalName();

            if(Storage::disk('procedimiento/archivo')->put($file_route, file_get_contents($file->getRealPath()))){
              Storage::disk('procedimiento/archivo')->delete($procedimiento->url_document);
              $procedimiento->url_document= $file_route;
            } else {
              Flash::error(' Error al guardar el archivo en las procedimientos. ');
            }
          }

         $img= $request->file('img');
          if($img != null) {
            $img_route = time().'_'.$img->getClientOriginalName();

            if(Storage::disk('procedimiento/img')->put($img_route, file_get_contents($img->getRealPath()))){
              Storage::disk('procedimiento/img')->delete($procedimiento->url_img);
              $procedimiento->url_img= $img_route;
            } else {
              Flash::error(' Error al guardar la imagen en las noticias. ');
            }
          }
    
         $updated = $procedimiento->save();
         $message = $updated ? 'Procedimiento actualizado correctamente!' : 'El Procedimiento NO pudo actualizarse!';
        
        return redirect()->route('procedimientos.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     * @param Procedimiento $procedimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Procedimiento $procedimiento)
    {
      
          $deleted = $procedimiento->delete();

          if($deleted == true){
            Storage::disk('procedimiento/archivo')->delete($procedimiento->url_document);

            Storage::disk('procedimiento/img')->delete($procedimiento->url_img);
                      
          } else {
            Flash::error(' Error al eliminar la procedimiento. ');
          }
        
        $message = $deleted ? 'Procedimiento eliminado correctamente!' : 'El Procedimiento NO pudo eliminarse!';
        
        return redirect()->route('procedimientos.index')->with('message', $message);
    }
}
