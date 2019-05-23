<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveRequisitoRequest;
use App\Models\Requirement;

class RequisitoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:requirements.create')->only(['create','atore']);
        $this->middleware('permission:requirements.index')->only('index');
        $this->middleware('permission:requirements.edit')->only(['edit','update']);
        $this->middleware('permission:requirements.show')->only('show');
        $this->middleware('permission:requirements.destroy')->only('destroy');

    }
    public function index()
    {
        $requirements = Requirement::all();
        return view('admin.requisitos.index', compact('requirements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.requisitos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveRequisitoRequest $request)
    {
        $data = [
            'descripcion' => $request->get('descripcion')
        ];

        $requirement = Requirement::create($data);

        $message = $requirement ? 'Requisito agregado correctamente!' : 'El Requisito NO pudo agregarse!';
        
        return redirect()->route('requirements.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Requirement $requirement)
    {
        return $requirement;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Requirement $requirement)
    {
        return view('admin.requisitos.edit', compact('requirement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requirement $requirement)
    {
        $this->validate($request, [
            'descripcion'      => 'required'
        ]);
        $requirement->descripcion = $request->get('descripcion');
        $updated = $requirement->save();
        $message = $updated ? 'Requisito actualizado correctamente!' : 'El Requisito NO pudo actualizarse!';
        return redirect()->route('requirements.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requirement $requirement)
    {
        $deleted = $requirement->delete();

        $message = $deleted ? 'Requisito eliminado correctamente!' : 'El Requisito NO pudo eliminarse!';
        
        return redirect()->route('requirements.index')->with('message', $message);
    }
}
