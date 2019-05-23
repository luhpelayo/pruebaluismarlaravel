<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveAreaAcademicaRequest;
use App\Models\Aeraacademica;


class AreaAcademicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function __construct()
    {
        $this->middleware('permission:academica.create')->only(['create','atore']);
        $this->middleware('permission:academica.index')->only('index');
        $this->middleware('permission:academica.edit')->only(['edit','update']);
        $this->middleware('permission:academica.show')->only('show');
        $this->middleware('permission:academica.destroy')->only('destroy');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$permissions = Permission::paginate();
        $aeraAcademicas = Aeraacademica::all();
      
        return view('admin.areaacademica.index', compact('aeraAcademicas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        return view('admin.areaacademica.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveAreaAcademicaRequest $request)
    {
        $data = [
            'name'          => $request->get('name'),
            'slug'          => str_slug($request->get('name')),
            'description'   => $request->get('description')
        ];
        $aeraacademica = Aeraacademica::create($data);
      

        $message = $aeraacademica ? 'Area agregado correctamente!' : 'Area NO pudo agregarse!';
        
        return redirect()->route('academica.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Aeraacademica $aeraacademica)
    {
        return $aeraacademica;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Aeraacademica $aeraacademica)
    {
      dd( $aeraacademica);
        return view('admin.areaacademica.edit', compact('aeraacademica'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveAreaAcademicaRequest $request, Aeraacademica $aeraacademica)
    {
        $updated = $aeraacademica->update($request->all());

        $message = $updated ? 'Area actualizado correctamente!' : 'El Area NO pudo actualizarse!';
        return redirect()->route('academica.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aeraacademica $aeraacademica)
    {

        $deleted = $aeraacademica->delete();

        $message = $deleted ? 'Area eliminado correctamente!' : 'El Area NO pudo eliminarse!';
        
        return redirect()->route('academica.index')->with('message', $message);
    }
}
