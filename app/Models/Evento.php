<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos';
    protected $fillable = ['title', 'url_img', 'url_document', 'content', 'event_date', 'lugar','org','user_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function scopeTitle($query, $title)
    {
      //dd("scope: ".$descripcion);
        if(trim($title) !="")
        {
           $query->where('title','like','%'.$title.'%');
        }
    
     
    } 
   
}
