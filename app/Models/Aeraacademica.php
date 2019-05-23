<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aeraacademica extends Model
{
    protected $table = 'aeraacademicas';
    protected $fillable = ['name','slug','description'];

    public function planificacions()
    {
        return $this->hasMany('App\Models\Planificacion');
    }
   
}
