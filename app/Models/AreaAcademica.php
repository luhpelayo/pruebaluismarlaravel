<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaAcademica extends Model
{
    protected $table = 'areaAcademicas';
    protected $fillable = ['name','slug','description'];

    public function planificacions()
    {
        return $this->hasMany('App\Models\Planificacion');
    }
    
}
