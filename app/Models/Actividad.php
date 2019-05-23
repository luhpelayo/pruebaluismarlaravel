<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividads';

    protected $fillable = ['name','slug','description','fecha_ini','fecha_fin','presupuesto','indicador','plan_id'];

    public function planificacion()
    {
        return $this->belongsTo('App\Models\Planificacion');
    }
}
