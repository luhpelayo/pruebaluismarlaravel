<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meta;


class MetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metas = Meta::all();
        return view('admin.meta.index', compact('metas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.meta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveEstadoRequest $request)
    {
        $meta = new Meta;
        $planif->meta=$request->get('meta');

        $meta->save();

        $message = $meta ? 'Meta agregada correctamente!' : 'La Meta NO pudo agregarse!';
        
        return redirect()->route('meta.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Meta $meta)
    {
        return $meta;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Meta $meta)
    {
        return view('admin.meta.edit', compact('meta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveEstadoRequest $request, Meta $meta)
    {
        $meta->fill($request->all());
        $updated = $meta->save();
        $message = $updated ? 'Meta actualizado correctamente!' : 'El meta NO pudo actualizarse!';
        return redirect()->route('meta.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meta $meta)
    {
        $deleted = $meta->delete();

        $message = $deleted ? 'Meta eliminado correctamente!' : 'La meta NO pudo eliminarse!';
        
        return redirect()->route('meta.index')->with('message', $message);
    }

}
