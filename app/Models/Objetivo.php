<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Objetivo extends Model
{
    protected $table = 'objetivos';
    protected $fillable = ['description','type','plan_id'];

    public function planificacion()
    {
        return $this->belongsTo('App\Models\Planificacion');
    }
}
