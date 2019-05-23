<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Derivacion extends Model
{
    protected $table = 'derivacions';
    protected $fillable = ['area_id', 'tramite_id', 'observacion'];

  	public function tramite()
    {
        return $this->belongsTo('App\Models\Tramite');
    }
      	public function area()
    {
        return $this->belongsTo('App\Models\Area');
    }
}
