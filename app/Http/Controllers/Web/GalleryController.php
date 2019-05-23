<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Photo;

class GalleryController extends Controller
{

    protected $pho;

    public function index()
    {
        $galleries = Gallery::all();
        $pho=0;
       
       return view('store.gallery.gallery',compact('galleries','pho'));
    }

    public function photo($id){

       $galerias = Gallery::find($id);
       $galleries = Gallery::all();
       $pho=1;
       //$photos= $galerias->photos;

      return view('store.gallery.gallery' , ['galerias'=>$galerias,'galleries' => $galleries,'pho' => $pho]);
    } 
}
