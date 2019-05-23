<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Caffeinated\Shinobi\Models\Permission;
use App\Http\Requests\SavePermissionRequest;

class PermisosController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:permisos.create')->only(['create','atore']);
        $this->middleware('permission:permisos.index')->only('index');
        $this->middleware('permission:permisos.edit')->only(['edit','update']);
        $this->middleware('permission:permisos.show')->only('show');
        $this->middleware('permission:permisos.destroy')->only('destroy');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$permissions = Permission::paginate();
        $permissions = Permission::all();
      
        return view('admin.permisos.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        return view('admin.permisos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SavePermissionRequest $request)
    {
        $permission = Permission::create($request->all());
      

        $message = $permission ? 'Permiso agregado correctamente!' : 'Permiso NO pudo agregarse!';
        
        return redirect()->route('permissions.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        return $permission;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
      
        return view('admin.permisos.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SavePermissionRequest $request, Permission $permission)
    {
        $updated = $permission->update($request->all());

        $message = $updated ? 'Permiso actualizado correctamente!' : 'El permiso NO pudo actualizarse!';
        return redirect()->route('permissions.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {

        $deleted = $permission->delete();

        $message = $deleted ? 'Permiso eliminado correctamente!' : 'El permiso NO pudo eliminarse!';
        
        return redirect()->route('permissions.index')->with('message', $message);
    }
}
