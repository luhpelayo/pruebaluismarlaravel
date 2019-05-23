<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    protected $table = 'metas';
    protected $fillable = ['description','plan_id'];

    public function planificacion()
    {
        return $this->belongsTo('App\Models\Planificacion');
    }
}
