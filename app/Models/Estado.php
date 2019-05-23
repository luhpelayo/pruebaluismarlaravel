<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
     protected $table = 'estados';
     protected $fillable = ['estado'];
     public $timestamps = false;

    public function tramites()
    {
        return $this->hasMany('App\Models\Tramite');
    }
}
