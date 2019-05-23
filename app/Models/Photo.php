<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photos';
    protected $fillable = ['file_name','title','path','file_size','gallery_id'];

    public function gallery()
    {
        
        return $this->belongsTo('App\Models\Gallery');
       
    }
}
