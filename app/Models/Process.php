<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    protected $table = 'processes';
    protected $fillable = ['descripcion', 'tiempo'];

    public function requirements()
    {
        return $this->belongsToMany('App\Models\Requirement');
    }

    public function receptions()
    {
        return $this->hasMany('App\Models\Reception');
    } 
}
