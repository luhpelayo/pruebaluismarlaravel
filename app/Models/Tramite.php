<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
    protected $table = 'tramites';

	protected $fillable = ['tipo','nroficio','referencia', 'user_id', 'estado_id'];

	public function estado()
    {
        return $this->belongsTo('App\Models\Estado');
    }

  

    public function derivacions()
    {
        return $this->hasMany('App\Models\Derivacion');
    } 

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function archivos(){
        return $this->hasMany('App\Models\Archivo')->orderBy('file_name', 'ASC');
        
    }

 

    public function scopecreated_at($query,$created_at)
    {
     // dd("scope: ".$fecha);
        if(trim($created_at) !="")
        {
            $query->where('created_at',$created_at);
            //return $query->where('idMovil', 'LIKE', "%$idMovil%");
        }
    }
    
    public function scopeCi($query, $nombre)
    {
      //dd("scope: ".$descripcion);
        if(trim($nombre) !="")
        {
           //$query->where('nombre', $nombre);
            //$query->where(\DB::raw("CONCAT(nombre,'',palabraClabe)"),"LIKE", "%$palabraClabe%");
           $query->where('nombre','like','%'.$nombre.'%');
        }
    
     
    }  




    public function areas()
    {
        return $this->belongsToMany('App\Models\Area');
    
    }
    public function reception()
    {
        return $this->hasOne('App\Models\Reception');
    }
    public function despacho()
    {
        return $this->hasOne('App\Models\Despacho');
    }
}
