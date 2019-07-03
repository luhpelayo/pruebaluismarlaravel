<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cronograma extends Model
{
    protected $table = 'cronogramas';
    protected $fillable = ['title', 'url_img', 'url_document', 'cronog_date', 'lugar','user_id'];

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