<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
     protected $table = 'areas';
     protected $fillable = ['descripcion','direccion','lat','lon','url_img'];
     public $timestamps = false;

    public function derivacions()
    {
        return $this->hasMany('App\Models\Derivacion');
    } 
 
    public function scopeDescripcion($query, $descripcion)
    {
      //dd("scope: ".$descripcion);
        if(trim($descripcion) !="")
        {
           //$query->where('descripcion', $descripcion);
            //$query->where(\DB::raw("CONCAT(nombre,'',palabraClabe)"),"LIKE", "%$palabraClabe%");
           $query->where('descripcion','like','%'.$descripcion.'%');
        }
    
     
    }  
}
