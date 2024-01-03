<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SavePersonalRequest;
use App\Models\Personal;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\Solicitante;
use App\Models\Contact;
use File;
use Session;
use Storage;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        //$this->middleware('permission:personal.create')->only(['create','atore']);
        $this->middleware('permission:personal.index')->only('index');
        $this->middleware('permission:personal.edit')->only(['edit','update']);
        $this->middleware('permission:personal.show')->only('show');
        $this->middleware('permission:personal.destroy')->only('destroy');

    }
    public function index()
    {
       // dd($request->get('nombre'));
      //$personals = Personal::all();
      $personal = Personal::all();
        //dd($personals);

     return view('admin.personal.index', compact('personal'));
    }

    public function listAPI(Request $request) {
      $personals = Personal::nombre($request->get('nombre'))->orderby('id','DESC')->paginate(5);
        return $personals;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_ip = getenv('REMOTE_ADDR');
        $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
        $la = $geo["geoplugin_latitude"];
        $l = $geo["geoplugin_longitude"];
      
        $geoip=$la.",".$l;
       // return view('admin.personal.create');
        return view('admin.personal.create', compact('geoip'));
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
     
            'nombre'   => 'required',
            'apellido_paterno'     => 'required',
            'apellido_materno'           => 'required',
            'telefono'           => 'required',
            'ci'           => 'required',
            'genero'           => 'required',
            'estado_civil'           => 'required',
            'direccion'           => 'required',
         
        ]);
        $personal=new Personal;
        $personal->nombre=$request->get('nombre');
        $personal->apellido_paterno=$request->get('apellido_paterno');
        $personal->apellido_materno=$request->get('apellido_materno');
        $personal->telefono=$request->get('telefono');
        $personal->ci=$request->get('ci');
        $personal->genero=$request->get('genero');
        $personal->estado_civil=$request->get('estado_civil');
        $personal->direccion=$request->get('direccion');

        
        if ($image = $request->file('img')) {
            $destinationPath = 'images/areas';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $personal->url_img=$destinationPath.'/'.$profileImage;
            
          
  }

 
        $personal->save();
        $message = $personal ? ' SE REGISTRO CORRECTAMENTE EN LA APLICACION!' : 'Personal NO pudo agregarse!';
        
        return redirect()->route('personal.index')->with('message', $message);
        //return redirect()->route('home')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Personal $personal)
    {
        return $personal;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Personal $personal)
    {
    
        return view('admin.personal.edit', compact('personal'));
    }


    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
    * @param  Personal $personal
     * @return \Illuminate\Http\Response
     */
    public function update( Personal $personal, Request $request)
    {
        $this->validate($request, [
            'nombre'   => 'required',
            'apellido_paterno'     => 'required',
            'apellido_materno'           => 'required',
            'telefono'           => 'required',
            'ci'           => 'required',
            'genero'           => 'required',
            'estado_civil'           => 'required',
            'direccion'           => 'required',
        ]);

        $personal->nombre=$request->get('nombre');
        $personal->apellido_paterno=$request->get('apellido_paterno');
        $personal->apellido_materno=$request->get('apellido_materno');
        $personal->telefono=$request->get('telefono');
        $personal->ci=$request->get('ci');
        $personal->genero=$request->get('genero');
        $personal->estado_civil=$request->get('estado_civil');
        $personal->direccion=$request->get('direccion');

        if ($image = $request->file('img')) {
            $destinationPath = 'images/areas';
              $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
              $image->move($destinationPath, $profileImage);
              $personal->url_img=$destinationPath.'/'.$profileImage;
          } else {
            $personal->url_img=null;
            File::delete($personal->url_img);
          }

        
        $updated = $personal->update();
        $message = $updated ? ' actualizado correctamente!' : 'El NO pudo actualizarse!';
        return redirect()->route('personal.index')->with('message', $message);
    }

    /**
     * Delete the specified resource in storage.
     * @param Personal $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personal $personal)
    {
        $deleted = $personal->delete();

        $image_path = $personal->url_img;  // the value is : localhost/project/image/filename.format
          if(File::exists($image_path)) {
              File::delete($image_path);
          }
        $message = $deleted ? ' eliminado correctamente!' : 'El personal NO pudo eliminarse!';
        
        return redirect()->route('personal.index')->with('message', $message);
    }




/**
 * Obtener una lista paginada de áreas.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\JsonResponse
 */
public function indexAPI(Request $request)
{
    $personals = Personal::nombre($request->get('nombre'))->orderby('id', 'DESC')->paginate(5);
    
    return response()->json(['personals' => $personals], JsonResponse::HTTP_OK);
}

/**
 * Almacenar una nueva área en la base de datos.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\JsonResponse
 */
public function storeAPI(Request $request)
{
    $this->validate($request, [
        'nombre'   => 'required',
        'apellido_paterno'     => 'required',
        'apellido_materno'           => 'required',
        'telefono'           => 'required',
        'ci'           => 'required',
        'genero'           => 'required',
        'estado_civil'           => 'required',
        'direccion'           => 'required',
    ]);

    $personal = new Personal;
    $personal->nombre=$request->get('nombre');
    $personal->apellido_paterno=$request->get('apellido_paterno');
    $personal->apellido_materno=$request->get('apellido_materno');
    $personal->telefono=$request->get('telefono');
    $personal->ci=$request->get('ci');
    $personal->genero=$request->get('genero');
    $personal->estado_civil=$request->get('estado_civil');
    $personal->direccion=$request->get('direccion');

    if ($image = $request->file('img')) {
        $destinationPath = 'images/areas';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $personal->url_img = $destinationPath.'/'.$profileImage;
    }

    $personal->save();

    $message = $personal ? 'Personal registrada correctamente en la aplicación!' : 'No se pudo agregar el área';

    return new JsonResponse(['message' => $message, 'personal' => $personal], JsonResponse::HTTP_CREATED);
}

public function showAPI(Personal $personal)
{
    return response()->json($personal);
}


/**
 * Actualizar un personal existente en la base de datos.
 *
 * @param  \App\Models\Personal  $personal
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\JsonResponse
 */
public function updateAPI(Personal $personal, Request $request)
{
    $this->validate($request, [
        'nombre'   => 'required',
        'apellido_paterno'     => 'required',
        'apellido_materno'           => 'required',
        'telefono'           => 'required',
        'ci'           => 'required',
        'genero'           => 'required',
        'estado_civil'           => 'required',
        'direccion'           => 'required',
        
    ]);

    $personal->nombre = $request->get('nombre');
    $personal->apellido_paterno = $request->get('apellido_paterno');
    $personal->apellido_materno = $request->get('apellido_materno');
    $personal->telefono = $request->get('telefono');
    $personal->ci = $request->get('ci');
    $personal->genero = $request->get('genero');
    $personal->estado_civil = $request->get('estado_civil');
    $personal->direccion = $request->get('direccion');

    if ($image = $request->file('img')) {
        $destinationPath = 'images/areas';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);

        // Verificar y eliminar la imagen anterior solo si se proporciona una nueva imagen
        if (!is_null($personal->url_img) && File::exists($personal->url_img)) {
            File::delete($personal->url_img);
        }

        $personal->url_img = $destinationPath.'/'.$profileImage;
    }

    $personal->save();

    $message = $personal ? 'Personal actualizado correctamente' : 'No se pudo actualizar el personal';

    $statusCode = $personal ? 200 : 404;

    return response()->json(['message' => $message, 'personal' => $personal], $statusCode);
}


/**
 * Eliminar un personal existente en la base de datos.
 *
 * @param  \App\Models\Personal  $personal
 * @return \Illuminate\Http\JsonResponse
 */
public function destroyAPI(Personal $personal)
{
    // Lógica para eliminar en la base de datos
    $deleted = $personal->delete();

    // Eliminar la imagen asociada si existe
    if ($deleted && !is_null($personal->url_img)) {
        File::delete($personal->url_img);
    }

    $message = $deleted ? 'Personal eliminada correctamente' : 'No se pudo eliminar el área';

    return new JsonResponse(['message' => $message], JsonResponse::HTTP_OK);
}




public function updateImageUrlAPI($id, Request $request)
{
    $this->validate($request, [
       
    ]);

    try {
        $personal = Personal::findOrFail($id);

        if ($image = $request->file('img')) {
            $destinationPath = 'images/areas';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);

            // Eliminar la imagen anterior si existe
            if (!is_null($personal->url_img)) {
                Storage::delete($personal->url_img);
            }

            // Actualizar la URL de la imagen
            $personal->url_img = $destinationPath.'/'.$profileImage;
            $personal->save();

            return response()->json(['message' => 'URL de imagen actualizada correctamente', 'personal' => $personal], 200);
        }
    } catch (\Exception $e) {
        // Agrega un log o imprime la excepción
        Log::error('Error al actualizar la imagen: ' . $e->getMessage());

        // Devuelve una respuesta de error detallada
        return response()->json(['message' => 'Error al actualizar la imagen', 'error' => $e->getMessage()], 500);
    }

    return response()->json(['message' => 'No se proporcionó una imagen válida'], 400);
}



}