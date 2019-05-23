<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Solicitante extends Model
{
    protected $table = 'solicitantes';
    protected $fillable = ['ci','nombre','apellido','telefono','email'];

    public function receptions()
    {
        return $this->hasMany('App\Models\Reception');
    }

    public function scopeNombre($query, $nombre)
    {
      //dd("scope: ".$descripcion);
        if(trim($nombre) !="")
        {
           //$query->where('nombre', $nombre);
            //$query->where(\DB::raw("CONCAT(nombre,'',palabraClabe)"),"LIKE", "%$palabraClabe%");
           $query->where('nombre','like','%'.$nombre.'%');
        }
    
     
    }  
}
