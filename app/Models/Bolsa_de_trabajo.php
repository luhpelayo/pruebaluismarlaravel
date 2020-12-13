<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bolsa_de_trabajo extends Model
{
    protected $table = 'bolsa_de_trabajos';
    protected $fillable = ['nombre', 'anho_de_graduacion','genero','anhos_de_experiencia','paquetes_informaticos','ingles','maestrias','postgrado', 'email', 'telefono', 'curriculum', 'event_date'];

    //public function user()
    //{
    //  return $this->belongsTo('App\Models\User');
    //}


    public function scopeNombre($query, $nombre)
    {
      //dd("scope: ".$descripcion);
        if((trim($nombre) !=""))
        {
           $query->where('nombre',$nombre);
        }
    
     
    } 

    public function scopebusqueda($query, $nombre,$anho_de_graduacion)
    {
        if((trim($anho_de_graduacion) !="")||(trim($nombre)!="")){

              $query->where('nombre',$nombre)->orwhere('$anho_de_graduacion',$anho_de_graduacion);


        }


    } 


    public function scopeAnho_de_graduacion($query, $anho_de_graduacion)
    {
      //dd("scope: ".$descripcion);
        if((trim($anho_de_graduacion) !=""))
        {
           $query->where('anho_de_graduacion',$anho_de_graduacion);
        }
    
     
    } 
    public function scopeGenero($query, $genero)
    {
      //dd("scope: ".$descripcion);
        if((trim($genero) !=""))
        {
           $query->where('genero',$genero);
        }
    
     
    } 
    public function scopeAnhos_de_experiencia($query, $anhos_de_experiencia)
    {
      //dd("scope: ".$descripcion);
        if((trim($anhos_de_experiencia) !=""))
        {
           $query->where('anhos_de_experiencia',$anhos_de_experiencia);
        }
    
     
    } 
    public function scopeIngles($query, $ingles)
    {
      //dd("scope: ".$descripcion);
        if((trim($ingles) !=""))
        {
           $query->where('ingles',$ingles);
        }
    
    
    } 

    // public function scopeAnho_de_graduacion($query, $anho_de_graduacion,$genero,$anhos_de_experiencia,$ingles)
    // {
    //   // dd("scope: ".$genero);
    //     //  dd($genero);
    //     //      exit;
    //     if((trim($anho_de_graduacion) !="") || (trim($genero) !="") || (trim($anhos_de_experiencia) !="") || (trim($ingles) !=""))
    //     {
    //        $query->where('anho_de_graduacion',$anho_de_graduacion);
    //        $query->where('genero',$genero);
    //        $query->where('anhos_de_experiencia',$anhos_de_experiencia);
    //        $query->where('ingles',$ingles);
    //     }
    
     
    // } 
    // public function scopeNombre($query, $nombre)
    // {
    //   //dd("scope: ".$descripcion);
    //     if(trim($nombre) !="")
    //     {
    //        $query->where('nombre','like','%'.$nombre.'%');
    //     }
    
     
    // }
    // public function scopeGenero($query, $genero)
    // {
    //   //dd("scope: ".$descripcion);
    //     if(trim($genero) !="")
    //     {
    //        $query->where('genero','like','%'.$genero.'%');
    //     }
    
     
    // } 
    // public function scopeAnhos_de_experiencia($query, $anhos_de_experiencia)
    // {
    //   //dd("scope: ".$descripcion);
    //     if(trim($anhos_de_experiencia) !="")
    //     {
    //        $query->where('anhos_de_experiencia','like','%'.$anhos_de_experiencia.'%');
    //     }
    
     
    // } 
    // public function scopeIngles($query, $ingles)
    // {
    //   //dd("scope: ".$descripcion);
    //     if(trim($ingles) !="")
    //     {
    //        $query->where('ingles','like','%'.$ingles.'%');
    //     }
    
     
    // } 

}