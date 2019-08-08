<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bolsa_de_trabajo extends Model
{
    protected $table = 'bolsa_de_trabajos';
    protected $fillable = ['nombre', 'nroregistro', 'email', 'telefono', 'carta_de_presentacion', 'curriculum', 'event_date'];

    //public function user()
    //{
    //  return $this->belongsTo('App\Models\User');
    //}

    public function scopeTitle($query, $nombre)
    {
      //dd("scope: ".$descripcion);
        if(trim($nombre) !="")
        {
           $query->where('nombre','like','%'.$nombre.'%');
        }
    
     
    } 
   
}