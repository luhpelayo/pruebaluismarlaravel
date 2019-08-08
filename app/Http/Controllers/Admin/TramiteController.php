<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveTramiteRequest;
use App\Models\Tramite;
use App\Models\Solicitante;
use App\Models\User;
use App\Models\Estado;
use App\Models\Process;
use App\Models\Archivo;
use App\Models\Reception;
use App\Models\Despacho;
use Storage;
use DB;

class TramiteController extends Controller
{
    protected $tramite;
    protected $req;

    public function __construct(Tramite $tramite)
    {
       
        $this->tramite = $tramite;
        $this->middleware('permission:tramite.create')->only(['create','atore']);
        $this->middleware('permission:tramite.index')->only('index');
        $this->middleware('permission:tramite.edit')->only(['edit','update']);
        $this->middleware('permission:tramite.show')->only('show');
        $this->middleware('permission:tramite.destroy')->only('destroy');
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $estado = DB::table('estados')->where('estado', 'Recibido')->value('id');
        //$tramites = Tramite::where('estado_id',$estado)->get();
        $user=\Auth::user()->id;
        $tramites = Tramite::where([
                    ['estado_id','=',$estado],
                   
                    ])->get();
       
        return view('admin.tramite.index', compact('tramites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $req=0;
        $solicitantes = Solicitante::orderBy('id', 'desc')->pluck('ci', 'id');
        $process = Process::orderBy('id', 'desc')->pluck('descripcion', 'id');
        $estados = Estado::orderBy('id', 'desc')->pluck('estado', 'id');
        return view('admin.tramite.create',compact('solicitantes','estados','process','req'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveTramiteRequest $request)
    {

        if ($request->get('tipo')=='recepcion') {
            $estado = DB::table('estados')->where('estado', 'Recibido')->value('id');
            $data = [
                    'tipo'      => $request->get('tipo'),
                    'nroficio'       => $request->get('nroficio'),
                    'referencia'     => $request->get('referencia'),
                    'user_id'        => \Auth::user()->id,
                    'estado_id'      => $estado
                ];

            
            if ($tramite = Tramite::create($data)) {
                $id_tramite=$tramite->id;
                $recepcion=new Reception();
                $recepcion->tramite_id = $id_tramite;
                $recepcion->procedencia = $request->get('procedencia');
                $recepcion->solicitante_id = $request->get('solicitante_id');
                $recepcion->process_id = $request->get('process_id');
                $recepcion->save();
            } else {
                # code...
            }
            
        } else {

            $estado = DB::table('estados')->where('estado', 'Despachado')->value('id');
            $data = [
                    'tipo'      => $request->get('tipo'),
                    'nroficio'       => $request->get('nroficio'),
                    'referencia'     => $request->get('referencia'),
                    'user_id'        => \Auth::user()->id,
                    'estado_id'      => $estado
                ];
            if ($tramite = Tramite::create($data)) {
                $id_tramite=$tramite->id;
                $despacho=new Despacho();
                $despacho->tramite_id = $id_tramite;
                $despacho->destinatario = $request->get('destinatario');
                $despacho->reponsable = $request->get('reponsable');
                $despacho->save();
            } else {
                # code...
            }    
        }
               

        $message = $tramite ? 'Tramite agregado correctamente!' : 'Tramite NO pudo agregarse!';
        
        return redirect()->route('tramite.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tramite $tramite)
    {

      $archivos= $tramite->archivos;

      // $archivos = DB::table('archivos')->where('tramite_id', $tramite)->get();

       return view('admin.archivo.dropzone',compact('tramite','archivos'));

    }
    public function archivo($id)
    {
      $tramite = Tramite::find($id);
       $archivos= $tramite->archivos;
      //dd($archivos);
     

      // $archivos = DB::table('archivos')->where('tramite_id', $tramite)->get();

       return view('admin.archivo.dropzone',compact('tramite','archivos'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tramite $tramite)
    {
        $solicitantes = Solicitante::orderBy('id', 'desc')->pluck('ci', 'id');
        $process = Process::orderBy('id', 'desc')->pluck('descripcion', 'id');
        $estados = Estado::orderBy('id', 'desc')->pluck('estado', 'id');

        return view('admin.tramite.edit', compact('tramite','solicitantes','process','estados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveTramiteRequest $request, Tramite $tramite)
    {
        $tramite->fill($request->all());
        $updated = $tramite->save();
        $message = $updated ? 'Tramite actualizado correctamente!' : 'El tramite NO pudo actualizarse!';
        
        return redirect()->route('tramite.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tramite $tramite)
    {
        $deleted = $tramite->delete();

        $message = $deleted ? 'Tramite eliminado correctamente!' : 'El tramite NO pudo eliminarse!';
        
        return redirect()->route('tramite.index')->with('message', $message);
    }



    public function upload(Request $request,$id)
    {



        if ($request->file('file') && $request->file('file')->isValid()) {
          
            $destinationPath ='/tramites/archivo';
            $fileName = $request->file('file')->getClientOriginalName();
            $fileSize = $request->file('file')->getClientSize();

             $modelArchivo = new Archivo();
             $modelArchivo->file_name = $fileName;
             $modelArchivo->file_size = $fileSize;
             $modelArchivo->title = explode('.', $fileName)[0];
             $modelArchivo->path = $destinationPath.'/'.$fileName;
             $modelArchivo->tramite_id = $id;

             $upload_success =$request->file('file')->move(public_path() . $destinationPath, $fileName);
       
            if ($modelArchivo->save()) {

                 return response()->json(['success'=>$fileName]);              
               
            }else{
                return response()->json(['message' => 'Error al guardar el archivo'],422);
            }
        }else{
            return response()->json(['message' => 'Invalid image'],422);
        }
    }

    public function deleteFile()
    {
        
        return $this->tramite->deletePhoto(Input::get('file'));
    }

    public function deletePhoto($fileName)
    {
        Archivo::where('file_name', '=', $fileName)->delete();
        $destinationPath = '/tramites/archivo';
        File::delete($destinationPath.$fileName);
       

        return Response::json('success', 200);
    }
    function requisito($id)
    {

     $process = Process::find($id);
     $proces=$process->requirements;
    return $proces;
     
    }

}
