<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
     protected $table = 'personals';
     protected $fillable = ['nombre','apellido_paterno','apellido_materno','telefono','ci','genero','estado_civil','direccion','url_img'];
     public $timestamps = false;

    public function derivacions()
    {
        return $this->hasMany('App\Models\Derivacion');
    } 
 
    public function scopeNombre($query, $nombre)
    {
   
        if(trim($nombre) !="")
        {
           $query->where('nombre','like','%'.$nombre.'%');
        }
    
     
    }  
}
