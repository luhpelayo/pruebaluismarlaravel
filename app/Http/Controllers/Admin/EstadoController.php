<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveEstadoRequest;
use App\Models\Estado;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados = Estado::all();
        return view('admin.estado.index', compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.estado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveEstadoRequest $request)
    {
        $estados=new Estado;
        $estados->estado=$request->get('estado');

        $estados->save();

        $message = $estados ? 'Estado agregado correctamente!' : 'El estado NO pudo agregarse!';
        
        return redirect()->route('estado.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Estado $estado)
    {
        return $estado;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Estado $estado)
    {
        return view('admin.estado.edit', compact('estado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveEstadoRequest $request, Estado $estado)
    {
        $estado->fill($request->all());
        $updated = $estado->save();
        $message = $updated ? 'Estado actualizado correctamente!' : 'El estado NO pudo actualizarse!';
        return redirect()->route('estado.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estado $estado)
    {
        $deleted = $estado->delete();

        $message = $deleted ? 'Estado eliminado correctamente!' : 'El estado NO pudo eliminarse!';
        
        return redirect()->route('estado.index')->with('message', $message);
    }
}
