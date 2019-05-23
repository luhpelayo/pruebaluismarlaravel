<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    protected $table = 'requirements';
    protected $fillable = ['descripcion'];

    public function processes()
    {
        return $this->belongsToMany('App\Models\Process');
    }
}
