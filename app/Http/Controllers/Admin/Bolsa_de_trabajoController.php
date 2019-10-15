<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveBolsa_de_trabajoRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\Bolsa_de_trabajo;
use App\Models\User;
use App\Models\Contact;
use File;
use Session;
use Storage;

class Bolsa_de_trabajoController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {


    //     $bolsa_de_trabajo = Bolsa_de_trabajo::all();

    //     return view('admin.bolsa_de_trabajos.index',compact('bolsa_de_trabajo'));
    // }

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bolsa_de_trabajo = Bolsa_de_trabajo::anho_de_graduacion($request->get('anho_de_graduacion'))->orderby('id','DESC')->paginate(2);

        return view('admin.bolsa_de_trabajos.index', compact('bolsa_de_trabajo'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bolsa_de_trabajos.create');
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
            'nombre'      => 'required',
            'anho_de_graduacion' => 'required',
            'genero' => 'required',
            'anhos_de_experiencia' => 'required',
            'paquetes_informaticos' => 'required',
            'ingles' => 'required',
            'maestrias' => 'required',
            'postgrado' => 'required',
            'email'       => 'required',
            'telefono'    => 'required',
           // 'event_date' => 'required',
           
        ]);
          



        date_default_timezone_set('America/La_Paz');
        $fecha_actual=date("Y-m-d");


        $bolsa_de_trabajo=new Bolsa_de_trabajo;
        $bolsa_de_trabajo->nombre=$request->get('nombre');
        $bolsa_de_trabajo->anho_de_graduacion=$request->get('anho_de_graduacion');
        $bolsa_de_trabajo->genero=$request->get('genero');
        $bolsa_de_trabajo->anhos_de_experiencia=$request->get('anhos_de_experiencia');
        $bolsa_de_trabajo->paquetes_informaticos=$request->get('paquetes_informaticos');
        $bolsa_de_trabajo->ingles=$request->get('ingles');
        $bolsa_de_trabajo->maestrias=$request->get('maestrias');
        $bolsa_de_trabajo->postgrado=$request->get('postgrado');
        $bolsa_de_trabajo->email=$request->get('email');
        $bolsa_de_trabajo->telefono=$request->get('telefono');
      //  $bolsa_de_trabajo->event_date=$request->get('event_date');
        $bolsa_de_trabajo->event_date=$fecha_actual;
     
     //   $evento->user_id= \Auth::user()->id;
   
        // $file= $request->file('file');

        //   $file_route = time().'_'.$file->getClientOriginalName();
            
        //   if(Storage::disk('bolsa_de_trabajo/archivo')->put($file_route, file_get_contents($file->getRealPath()))) {
        //     $bolsa_de_trabajo->carta_de_presentacion= $file_route;
        //   } else {
        //     Flash::error(' Error al guardar el archivo en los bolsa_de_trabajos. ');
        //   }
          $file= $request->file('file');

          $file_route = time().'_'.$file->getClientOriginalName();
            
          if(Storage::disk('bolsa_de_trabajo/archivo')->put($file_route, file_get_contents($file->getRealPath()))) {
            $bolsa_de_trabajo->curriculum= $file_route;
          } else {
            Flash::error(' Error al guardar el archivo en los bolsa_de_trabajos. ');
          }
        


        $bolsa_de_trabajo->save();
         $message = $bolsa_de_trabajo ? 'Bolsa_de_trabajo agregado correctamente!' : 'Bolsa_de_trabajo NO pudo agregarse!';
//
//        $contacts= Contact::all();
//        $data = array(
//            'name'      =>  'jimmy',
//            'message'   =>   'Prueba2'
//        );
//        foreach ($contacts as $contact){
//
//            $email= $contact->getAttribute("email");
//            Mail::to($email)->send(new SendMail($data));
//        }

        return redirect()->route('bolsa_de_trabajos')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function show(Bolsa_de_trabajo $bolsa_de_trabajo)
    {
        return $bolsa_de_trabajo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Bolsa_de_trabajo $bolsa_de_trabajo)
    {
        return view('admin.bolsa_de_trabajos.edit', compact('bolsa_de_trabajo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Bolsa_de_trabajo $bolsa_de_trabajo
     * @return \Illuminate\Http\Response
     */
    public function update(Bolsa_de_trabajo $bolsa_de_trabajo,Request $request)
    {
    
        $this->validate($request, [
            'nombre'      => 'required',
            'anho_de_graduacion' => 'required',
            'genero' => 'required',
            'anhos_de_experiencia' => 'required',
            'paquetes_informaticos' => 'required',
            'ingles' => 'required',
            'maestrias' => 'required',
            'postgrado' => 'required',
            'email'       => 'required',
            'telefono'    => 'required',
          //  'event_date' => 'required',
             ]);
         

             date_default_timezone_set('America/La_Paz');
             $fecha_actual=date("Y-m-d");
             
           
              
          $bolsa_de_trabajo->nombre= $request->nombre;
          $bolsa_de_trabajo->anho_de_graduacion= $request->anho_de_graduacion;
          $bolsa_de_trabajo->genero= $request->genero;
          $bolsa_de_trabajo->anhos_de_experiencia= $request->anhos_de_experiencia;
          $bolsa_de_trabajo->paquetes_informaticos= $request->paquetes_informaticos;
          $bolsa_de_trabajo->ingles= $request->ingles;
          $bolsa_de_trabajo->maestrias= $request->maestrias;
          $bolsa_de_trabajo->postgrado= $request->postgrado;
          $bolsa_de_trabajo->email= $request->email;
          $bolsa_de_trabajo->telefono= $request->telefono;
         // $bolsa_de_trabajo->event_date=$request->get('event_date');
         $bolsa_de_trabajo->event_date=$fecha_actual;

//           $file= $request->file('file');
// //   if($file != null) {
//             $file_route = time().'_'.$file->getClientOriginalName();

//             if(Storage::disk('bolsa_de_trabajo/archivo')->put($file_route, file_get_contents($file->getRealPath()))){
//               Storage::disk('bolsa_de_trabajo/archivo')->delete($bolsa_de_trabajo->carta_de_presentacion);
//               $bolsa_de_trabajo->carta_de_presentacion= $file_route;
//             } else {
//               Flash::error(' Error al guardar el archivo en las bolsa_de_trabajos. ');
//             }
//     //      }

    $file= $request->file('file');
    //   if($file != null) {
                $file_route = time().'_'.$file->getClientOriginalName();
    
                if(Storage::disk('bolsa_de_trabajo/archivo')->put($file_route, file_get_contents($file->getRealPath()))){
                  Storage::disk('bolsa_de_trabajo/archivo')->delete($bolsa_de_trabajo->curriculum);
                  $bolsa_de_trabajo->curriculum= $file_route;
                } else {
                  Flash::error(' Error al guardar el archivo en las bolsa_de_trabajos. ');
                }
        //      }
    
    
         $updated = $bolsa_de_trabajo->save();
         $message = $updated ? 'Bolsa_de_trabajo actualizado correctamente!' : 'Bolsa_de_trabajo NO pudo actualizarse!';
        
        return redirect()->route('bolsa_de_trabajos.index')->with('message', $message);
    }

    /**
     * Delete the specified resource in storage.
     * @param Bolsa_de_trabajo $bolsa_de_trabajo
     * @return \Illuminate\Http\Response
     */

    public function destroy(Bolsa_de_trabajo $bolsa_de_trabajo)
    {
      
          $deleted = $bolsa_de_trabajo->delete();

          if($deleted == true){
            // Storage::disk('bolsa_de_trabajo/archivo')->delete($bolsa_de_trabajo->carta_de_presentacion);

            Storage::disk('bolsa_de_trabajo/archivo')->delete($bolsa_de_trabajo->curriculum);
                      
          } else {
            Flash::error(' Error al eliminar la bolsa_de_trabajo. ');
          }
        
        $message = $deleted ? 'Bolsa_de_trabajo eliminado correctamente!' : 'Bolsa_de_trabajo NO pudo eliminarse!';
        
        return redirect()->route('bolsa_de_trabajos.index')->with('message', $message);
    }
}
