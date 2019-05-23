<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveProcesoRequest;
use App\Models\Process;
use App\Models\Requirement;

class ProcesoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:processes.create')->only(['create','atore']);
        $this->middleware('permission:processes.index')->only('index');
        $this->middleware('permission:processes.edit')->only(['edit','update']);
        $this->middleware('permission:processes.show')->only('show');
        $this->middleware('permission:processes.destroy')->only('destroy');

    }
    public function index()
    {
        $processes = Process::all();
        return view('admin.procesos.index', compact('processes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $requirements = Requirement::get();
        return view('admin.procesos.create',compact('requirements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveProcesoRequest $request)
    {
        $process = Process::create($request->all());

        $process->requirements()->attach($request->get('requirements'));
        $message = $process ? 'Proceso agregado correctamente!' : 'El Proceso NO pudo agregarse!';
        
        return redirect()->route('processes.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Process $process)
    {
        return $process;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Process $process)
    {
        $requirements = Requirement::get();
        return view('admin.procesos.edit', compact('process','requirements'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveProcesoRequest $request, Process $process)
    {
        $process->fill($request->all());
        $updated = $process->save();

        $process->requirements()->sync($request->get('requirements'));
        $message = $updated ? 'Proceso actualizado correctamente!' : 'El Proceso NO pudo actualizarse!';
        return redirect()->route('processes.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Process $process)
    {
        $deleted = $process->delete();

        $message = $deleted ? 'Proceso eliminado correctamente!' : 'El Proceso NO pudo eliminarse!';
        
        return redirect()->route('processes.index')->with('message', $message);
    }
}
