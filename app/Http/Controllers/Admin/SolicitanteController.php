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

    function call_ia_fetch_price($image_file) {
      $url = 'http://143.244.180.140:5001/predict';
      $filenames = array($image_file);
      $files = array();
      foreach ($filenames as $f){
        $files[$f] = file_get_contents($f);
      }

      // curl
      $curl = curl_init();
      $boundary = uniqid();
      $delimiter = '-------------' . $boundary;
      $post_data = $this->build_data_files($boundary, $files);

      curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => $post_data,
        CURLOPT_HTTPHEADER => array(
          "Content-Type: multipart/form-data; boundary=" . $delimiter,
          "Content-Length: " . strlen($post_data)
        ),
      ));

      $response = curl_exec($curl);
      $response_json = json_decode($response, true);
      curl_close($curl);
      return $response_json['price_2'];
    }

    function build_data_files($boundary, $files){
      $data = '';
      $eol = "\r\n";
  
      $delimiter = '-------------' . $boundary;
  
      foreach ($files as $name => $content) {
          $data .= "--" . $delimiter . $eol
              . 'Content-Disposition: form-data; name="image"; filename="' . basename($name) . '"' . $eol
              //. 'Content-Type: image/png'.$eol
              . 'Content-Transfer-Encoding: binary'.$eol
              ;
  
          $data .= $eol;
          $data .= $content . $eol;
      }
      $data .= "--" . $delimiter . "--".$eol;
  
  
      return $data;
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
  
        if ($image = $request->file('img')) {
          $destinationPath = 'images/solicitantes';
          $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
          $image->move($destinationPath, $profileImage);
          $solicitante->url_img=$destinationPath.'/'.$profileImage;

          # calcular precio usando la IA
          $solicitante->precio=$this->call_ia_fetch_price($solicitante->url_img);
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
            ]);
       

           
            $solicitante->nombre=$request->get('nombre');
            $solicitante->apellido=$request->get('apellido');
            $solicitante->ci=$request->get('ci');
            $solicitante->telefono=$request->get('telefono');
            $solicitante->direccion=$request->get('direccion');
            $solicitante->lat=$request->get('lat');
            $solicitante->lon=$request->get('lon');
            $solicitante->email=$request->get('email');
        
            if ($image = $request->file('img')) {
          $destinationPath = 'images/solicitantes';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $solicitante->url_img=$destinationPath.'/'.$profileImage;   
            $solicitante->precio=$this->call_ia_fetch_price($solicitante->url_img);
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