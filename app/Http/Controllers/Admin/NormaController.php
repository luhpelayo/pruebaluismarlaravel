<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Norma;
use Storage;

class NormaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $normas = Norma::all();

        return view('admin.normas.index',compact('normas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.normas.create');
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
            'tipo_norma' => 'required',
            'nombre'     => 'required',
        
        ]);
        $norma=new Norma;
        $norma->tipo_norma=$request->get('tipo_norma');
        $norma->nombre=$request->get('nombre');
      
   
        $file= $request->file('file');
        if($file != null) {
          $file_route = time().'_'.$file->getClientOriginalName();
            
          if(Storage::disk('norma/archivo')->put($file_route, file_get_contents($file->getRealPath()))) {
            $norma->url_document= $file_route;
          } else {
            Flash::error(' Error al guardar el archivo en los normas. ');
          }
        }

        $norma->save();
         $message = $norma ? 'Norma agregado correctamente!' : 'Norma NO pudo agregarse!';
        
        return redirect()->route('normas.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Norma $norma)
    {
         return $norma;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Norma $norma)
    {
        return view('admin.normas.edit', compact('norma'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Norma $norma,Request $request)
    {
         $this->validate($request, [
                'tipo_norma' => 'required',
                'nombre'     => 'required',
            
            ]);
         
          $norma->tipo_norma= $request->tipo_norma;
          $norma->nombre= $request->nombre;

          $file= $request->file('file');

          if($file != null) {
            $file_route = time().'_'.$file->getClientOriginalName();

            if(Storage::disk('norma/archivo')->put($file_route, file_get_contents($file->getRealPath()))){
              Storage::disk('norma/archivo')->delete($norma->url_document);
              $norma->url_document= $file_route;
            } else {
              Flash::error(' Error al guardar el archivo en las normas. ');
            }
          }
    
         $updated = $norma->save();
         $message = $updated ? 'Norma actualizado correctamente!' : 'La Norma NO pudo actualizarse!';
        
        return redirect()->route('normas.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Norma $norma)
    {
        $deleted = $norma->delete();

          if($deleted == true){
            Storage::disk('norma/archivo')->delete($norma->url_document);
                      
          } else {
            Flash::error(' Error al eliminar la norma. ');
          }
        
        $message = $deleted ? 'Norma eliminado correctamente!' : 'La Norma NO pudo eliminarse!';
        
        return redirect()->route('normas.index')->with('message', $message);
    }
}
