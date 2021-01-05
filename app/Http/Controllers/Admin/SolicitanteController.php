<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveSolicitanteRequest;
use App\Models\Solicitante;

class SolicitanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $solicitantes = Solicitante::ci($request->get('ci'))->orderby('id','DESC')->paginate(2);

        return view('admin.solicitante.index', compact('solicitantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.solicitante.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveSolicitanteRequest $request)
    {
        $solicitante=new Solicitante;
        $solicitante->ci=$request->get('ci');
        $solicitante->nombre=$request->get('nombre');
        $solicitante->apellido=$request->get('apellido');
        $solicitante->telefono=$request->get('telefono');
        $solicitante->direccion=$request->get('direccion');
        $solicitante->lat=$request->get('lat');
        $solicitante->lon=$request->get('lon');
        $solicitante->email=$request->get('email');
        $solicitante->save();

        $message = $solicitante ? 'Solicitante agregado correctamente!' : 'Solicitante NO pudo agregarse!';
        
        return redirect()->route('solicitante.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Solicitante $solicitante)
    {
        return $solicitante;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Solicitante $solicitante)
    {
        return view('admin.solicitante.edit', compact('solicitante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveSolicitanteRequest $request, Solicitante $solicitante)
    {
        $solicitante->fill($request->all());
        $updated = $solicitante->save();
        $message = $updated ? 'Solicitante actualizado correctamente!' : 'El solicitante NO pudo actualizarse!';
        
        return redirect()->route('solicitante.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solicitante $solicitante)
    {
        $deleted = $solicitante->delete();

        $message = $deleted ? 'Solicitante eliminado correctamente!' : 'El solicitante NO pudo eliminarse!';
        
        return redirect()->route('solicitante.index')->with('message', $message);
    }
}
