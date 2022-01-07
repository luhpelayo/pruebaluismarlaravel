<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveSolicitanteRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\Solicitante;
use App\Models\Contact;
use File;
use Session;
use Storage;



class SolicitanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitante = Solicitante::all();

        return view('admin.solicitantes.index',compact('solicitante'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.solicitantes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //dd($request);
         $this->validate($request, [
            'nombre'      => 'required',
        
            'apellido'      => 'required',
            'ci'      => 'required',
            'telefono'      => 'required',
            'direccion'      => 'required',
            'lat'      => 'required',
            'lon'      => 'required',
            'email'      => 'required',
            'precio'      => 'required',
        ]);
      
        $solicitante=new Solicitante;
        $solicitante->nombre=$request->get('nombre');
        $solicitante->apellido=$request->get('apellido');
        $solicitante->ci=$request->get('ci');
        $solicitante->telefono=$request->get('telefono');
        $solicitante->direccion=$request->get('direccion');
        $solicitante->lat=$request->get('lat');
        $solicitante->lon=$request->get('lon');
        $solicitante->email=$request->get('email');
        $solicitante->precio=$request->get('precio');
      //  var_dump($cronograma);
       // exit();
      
   
    

        


  
// $img= $request->file('img');
// if($img != null) {
//   $img_route = time().'_'.$img->getClientOriginalName();

//   if(Storage::disk('solicitantes/img')->put($img_route, file_get_contents($img->getRealPath()))){
//     $solicitante->url_img= $img_route;
//   } else {
//     Flash::error(' Error al guardar la imagen en los cronogramas. ');
//   }
// }


if ($image = $request->file('img')) {
  $destinationPath = 'images/solicitantes';
  $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
  $image->move($destinationPath, $profileImage);
  $solicitante->url_img=$destinationPath.'/'.$profileImage;
}
//dd($destinationPath.$solicitante->url_img);
// dd($destinationPath.'/'.$solicitante->url_img);



      $solicitante->save();
         $message = $solicitante ? 'solicitante agregado correctamente!' : 'Cronograma NO pudo agregarse!';

        return redirect()->route('solicitantes.index')->with('message', $message);
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
        return view('admin.solicitantes.edit', compact('solicitante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Solicitante $solicitante
     * @return \Illuminate\Http\Response
     */
    public function update(Solicitante $solicitante,Request $request)
    {
    

             $this->validate($request, [
                'nombre'      => 'required',
            
                'apellido'      => 'required',
                'ci'      => 'required',
                'telefono'      => 'required',
                'direccion'      => 'required',
                'lat'      => 'required',
                'lon'      => 'required',
                'email'      => 'required',
                'precio'      => 'required',
            ]);
       

           
            $solicitante->nombre=$request->get('nombre');
            $solicitante->apellido=$request->get('apellido');
            $solicitante->ci=$request->get('ci');
            $solicitante->telefono=$request->get('telefono');
            $solicitante->direccion=$request->get('direccion');
            $solicitante->lat=$request->get('lat');
            $solicitante->lon=$request->get('lon');
            $solicitante->email=$request->get('email');
            $solicitante->precio=$request->get('precio');

    
          
         
  
        if ($image = $request->file('img')) {
          $destinationPath = 'images/solicitantes';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $solicitante->url_img=$destinationPath.'/'.$profileImage;
        } else {
          $solicitante->url_img=null;
          File::delete($solicitante->url_img);
        }

      

         $updated = $solicitante->update();
         $message = $updated ? 'Solicitante actualizado correctamente!' : 'El solicitante NO pudo actualizarse!';
        
        return redirect()->route('solicitantes.index')->with('message', $message);
    }

    /**
     * Delete the specified resource in storage.
     * @param Solicitante $solicitante
     * @return \Illuminate\Http\Response
     */

    public function destroy(Solicitante $solicitante)
    {
     
          $deleted = $solicitante->delete();
        
          // if($deleted == true){
          

          //   Storage::disk('solicitante')->delete($solicitante->url_img);
                      
          // } else {
          //   Flash::error(' Error al eliminar la solicitante. ');
          // }
          $image_path = $solicitante->url_img;  // the value is : localhost/project/image/filename.format
          if(File::exists($image_path)) {
              File::delete($image_path);
          }
        $message = $deleted ? 'Solicitante eliminado correctamente!' : 'El solicitante NO pudo eliminarse!';
        
        return redirect()->route('solicitantes.index')->with('message', $message);
    }
}
