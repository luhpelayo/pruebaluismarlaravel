<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Despacho extends Tramite
{
    protected $table = 'despachos';
   protected $primaryKey='tramite_id';
   public $incrementing = false;
    protected $fillable = ['tramite_id','destinatario','reponsable'];

    public function Tramite()
    {
        return $this->belongsTo('App\Models\Tramite');
    }
}
