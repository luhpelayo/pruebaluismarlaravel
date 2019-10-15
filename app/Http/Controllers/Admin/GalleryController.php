<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\SaveGalleryRequest;
use App\Models\Gallery;
use App\Models\Photo;
use Redirect;
use File;
use Response;
use Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $galleries = Gallery::all();

    //     return view('admin.gallery.index',compact('galleries'));
    // }
    public function index(Request $request)
    {
        $galleries = Gallery::content($request->get('content'))->orderby('id','DESC')->paginate(2);

        return view('admin.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title'        => 'Titulo de la galeria de foto',
            'slug'         => str_slug('title'),
            'content'      => 'Contenido de la galeria de foto',
            'status'       => 'DRAFT'
        ];
         $gallery = Gallery::create($data);
         $id=$gallery->id;
         return Redirect::to('/galleries/'.$id.'/edit');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        return $gallery;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallery::find($id);
    
        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveGalleryRequest $request, Gallery $gallery)
    {
       
        $gallery->fill($request->all());
        $gallery->slug = str_slug($request->get('title'));
        $updated = $gallery->update($request->all());


        $message = $updated ? 'Gallery actualizado correctamente!' : 'Gallery NO pudo actualizarse!';
        return redirect()->route('galleries.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {

        $deleted = $gallery->delete();

        $message = $deleted ? 'Gallery eliminado correctamente!' : 'Gallery NO pudo eliminarse!';
        
        return redirect()->route('galleries.index')->with('message', $message);
    }
    public function upload(Request $request,$id)
    {

        if ($request->file('file') && $request->file('file')->isValid()) {
          
            $destinationPath ='/photo/img';
            $fileName = $request->file('file')->getClientOriginalName();
            $fileSize = $request->file('file')->getClientSize();

             $modelArchivo = new Photo();
             $modelArchivo->file_name = $fileName;
             $modelArchivo->file_size = $fileSize;
             $modelArchivo->title = explode('.', $fileName)[0];
             $modelArchivo->path = $destinationPath.'/'.$fileName;
             $modelArchivo->gallery_id = $id;

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

    public function fhotoDestroy()
    {
        
        return $this->deletePhoto(Input::get('file'));
        
    } 
    public function deletePhoto($fileName)
    {
 
        Photo::where('file_name', '=', $fileName)->delete();
       
        Storage::disk('photo/img')->delete($fileName);
        return Response::json('success', 200);
    } 
}
