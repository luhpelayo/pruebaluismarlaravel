<?php

namespace App\models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Solicitante extends Model
{
    use SoftDeletes;
    protected $table = 'solicitantes';
    protected $fillable = ['nombre','apellido','ci','telefono','direccion','lat','lon','email','precio','url_img'];

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


