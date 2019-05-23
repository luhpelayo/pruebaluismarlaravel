<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Models\Archivo;
use App\Models\Tramite;
use DB;
use File;
use Response;
use Storage;

class FileUploadController extends Controller
{

    protected $tramite;

    public function __construct(Tramite $tramite)
    {
        $this->tramite = $tramite;  
        
    }

    public function archivo($id)
    {
       $tramite = Tramite::find($id);
       $archivos= $tramite->archivos;
      //dd($archivos);
     

      // $archivos = DB::table('archivos')->where('tramite_id', $tramite)->get();

       return view('admin.archivo.dropzone',compact('tramite','archivos'));

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

    public function fileDestroy()
    {
        //dd('HOLA MUNDO');
        return $this->deleteArchivo(Input::get('file'));
       
       // Archivo::where('file_name', '=', 'file')->delete();
       // $destinationPath = '/tramites/archivo';
       // File::delete($destinationPath.$fileName);
        
    } 
    public function deleteArchivo($fileName)
    {
        //dd($fileName);
        Archivo::where('file_name', '=', $fileName)->delete();
        //$destinationPath = '/tramites/archivo';
        //File::delete($destinationPath.$fileName);
       
        Storage::disk('tramites/archivo')->delete($fileName);
        return Response::json('success', 200);
    }
}
