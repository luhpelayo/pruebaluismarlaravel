<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Solicitante extends Model
{
    protected $table = 'solicitantes';
    protected $fillable = ['ci','nombre','apellido','telefono','direccion','lat','lon','email'];

    public function receptions()
    {
        return $this->hasMany('App\Models\Reception');
    }

    public function scopeCi($query, $ci)
    {
      //dd("scope: ".$descripcion);
        if(trim($ci) !="")
        {
           //$query->where('nombre', $nombre);
            //$query->where(\DB::raw("CONCAT(nombre,'',palabraClabe)"),"LIKE", "%$palabraClabe%");
           $query->where('ci','like','%'.$ci.'%');
        }
    
     
    }  
}
