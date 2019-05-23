<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reception extends Tramite
{
    protected $table = 'receptions';
    protected $primaryKey='tramite_id';
    public $incrementing = false;
    protected $fillable = ['tramite_id','procedencia','solicitante_id','process_id'];

    public function Tramite()
    {
        return $this->belongsTo('App\Models\Tramite');
    }
    public function solicitante()
    {
        return $this->belongsTo('App\Models\Solicitante');
    }

    public function process()
    {
        return $this->belongsTo('App\Models\Process');
    }
}
