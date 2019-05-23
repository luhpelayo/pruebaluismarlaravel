<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    protected $table = 'archivos';
    protected $fillable = ['file_name','title','path','file_size','tramite_id'];



    public function tramite()
    {
        
        return $this->belongsTo('App\Models\Tramite');
       
    }

    public function getNameAttribute($name) {
        return substr($this->tramite_id, 0, 1) . DIRECTORY_SEPARATOR . $this->tramite_id . DIRECTORY_SEPARATOR . $name;
    }
}
