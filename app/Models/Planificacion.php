<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Planificacion extends Model
{
    protected $table = 'planificacions';
    protected $fillable = ['anio','name','slug','description','area_id','user_id'];

    public function areaAcademica()
    {
        return $this->belongsTo('App\Models\Areaacademica');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function objetivos()
    {
        return $this->hasMany('App\Models\Objetivo');
    }

    public function metas()
    {
        return $this->hasMany('App\Models\Meta');
    }

    public function actividads()
    {
        return $this->hasMany('App\Models\Actividad');
    }
}
