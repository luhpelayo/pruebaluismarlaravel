<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
	 public $table = 'galleries';
     public $fillable = ['title', 'content', 'status'];

    public function photos(){
        return $this->hasMany('App\Models\Photo');
        
    }

    public function scopeContent($query, $content)
    {
      //dd("scope: ".$descripcion);
        if(trim($content) !="")
        {
           $query->where('content','like','%'.$content.'%');
        }
    
     
    } 
}
