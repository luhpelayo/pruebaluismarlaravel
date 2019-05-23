<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SlideImage;

class SlideController extends Controller
{
    public function index(){
     
      return view('store.index',['homeActive' => true , 'slideImages' => SlideImage::all()]);
    }

    public function store(Request $request){
    	$this->validate($request, [
            'file' => 'image',
        ]);

        $slideImage = new SlideImage;

    	$file = $request->file('file');
        $file_route = time().'_'.$file->getClientOriginalName();
        $image = Image::make($request->file('file'))->resize(1900, 530)->save('img/img_include/slideImages/'.$file_route);
        $icon = Image::make($request->file('file'))->resize(410, 115)->save('img/img_include/slideImages/'.'icon_'.$file_route);

        $slideImage->url = $image->basename;
        $slideImage->icon = $icon->basename;
        $slideImage->user = Auth::user()->id;

        if($slideImage->save()){
            Flash::success(' Imagen agregada al carrusel exitosamente. ');
        }
        return back();
    } 
}
