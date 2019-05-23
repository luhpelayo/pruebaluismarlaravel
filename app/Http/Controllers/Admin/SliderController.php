<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SlideImage;
use Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:sliders.create')->only(['create','atore']);
        $this->middleware('permission:sliders.index')->only('index');
        $this->middleware('permission:sliders.edit')->only(['edit','update']);
        $this->middleware('permission:sliders.show')->only('show');
        $this->middleware('permission:sliders.destroy')->only('destroy');

    }
    public function index()
    {
       $slider = SlideImage::all();

        return view('admin.slider.index',compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
      
        $slider=new SlideImage;
       
        $img= $request->file('img');
        if($img != null) {
          $img_route = time().'_'.$img->getClientOriginalName();

          if(Storage::disk('slider/img')->put($img_route, file_get_contents($img->getRealPath()))){
            $slider->url= $img_route;
          } 
        }

        $slider->save();
        $message = $slider ? 'Slider agregado correctamente!' : 'Slider NO pudo agregarse!';
        
        return redirect()->route('sliders.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SlideImage $slider)
    {
        return $slider;
    }
    public function edit(SlideImage $slider)
    {
        
        //return view('admin.procedimientos.edit', compact('role','procedimiento'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SlideImage $slider)
    {
       
        $deleted = $slider->delete();

          if($deleted == true){
            Storage::disk('slider/img')->delete($slider->url);
                      
          } 
        
        $message = $deleted ? 'SlideImage eliminado correctamente!' : 'El SlideImage NO pudo eliminarse!';
        
        return redirect()->route('sliders.index')->with('message', $message);
    }
}
