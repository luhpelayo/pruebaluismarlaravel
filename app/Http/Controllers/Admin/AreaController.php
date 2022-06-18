<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveAreaRequest;
use App\Models\Area;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\Solicitante;
use App\Models\Contact;
use File;
use Session;
use Storage;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        //$this->middleware('permission:area.create')->only(['create','atore']);
        $this->middleware('permission:area.index')->only('index');
        $this->middleware('permission:area.edit')->only(['edit','update']);
        $this->middleware('permission:area.show')->only('show');
        $this->middleware('permission:area.destroy')->only('destroy');

    }
    public function index()
    {
       // dd($request->get('descripcion'));
      //$areas = Area::all();
      $area = Area::all();
        //dd($areas);

     return view('admin.area.index', compact('area'));
    }

    public function listAPI(Request $request) {
      $areas = Area::descripcion($request->get('descripcion'))->orderby('id','DESC')->paginate(5);
        return $areas;
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
       // return view('admin.area.create');
        return view('admin.area.create', compact('geoip'));
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
            'descripcion'      => 'required',
        
            'direccion'      => 'required',
            'lat'      => 'required',
            'lon'      => 'required',
         
        ]);
        $area=new Area;
        $area->descripcion=$request->get('descripcion');
        $area->direccion=$request->get('direccion');
        $area->lat=$request->get('lat');
        $area->lon=$request->get('lon');
        
        if ($image = $request->file('img')) {
            $destinationPath = 'images/areas';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $area->url_img=$destinationPath.'/'.$profileImage;
            
          
  }

 
        $area->save();
        $message = $area ? ' SE REGISTRO CORRECTAMENTE EN LA APLICACION!' : 'Area NO pudo agregarse!';
        
        return redirect()->route('area.index')->with('message', $message);
        //return redirect()->route('home')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        return $area;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
    
        return view('admin.area.edit', compact('area'));
    }


    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
    * @param  Area $area
     * @return \Illuminate\Http\Response
     */
    public function update( Area $area, Request $request)
    {
        $this->validate($request, [
            'descripcion'      => 'required',
            'direccion'      => 'required',
            'lat'      => 'required',
            'lon'      => 'required',
        ]);

        $area->descripcion=$request->get('descripcion');
        $area->direccion=$request->get('direccion');
        $area->lat=$request->get('lat');
        $area->lon=$request->get('lon');

        if ($image = $request->file('img')) {
            $destinationPath = 'images/areas';
              $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
              $image->move($destinationPath, $profileImage);
              $area->url_img=$destinationPath.'/'.$profileImage;
          } else {
            $area->url_img=null;
            File::delete($area->url_img);
          }

        
        $updated = $area->update();
        $message = $updated ? ' actualizado correctamente!' : 'El NO pudo actualizarse!';
        return redirect()->route('area.index')->with('message', $message);
    }

    /**
     * Delete the specified resource in storage.
     * @param Area $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        $deleted = $area->delete();

        $image_path = $area->url_img;  // the value is : localhost/project/image/filename.format
          if(File::exists($image_path)) {
              File::delete($image_path);
          }
        $message = $deleted ? ' eliminado correctamente!' : 'El area NO pudo eliminarse!';
        
        return redirect()->route('area.index')->with('message', $message);
    }
}