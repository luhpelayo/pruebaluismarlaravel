<?php

namespace App\models;

use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, ShinobiTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','area_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tramites()
    {
        return $this->hasMany('App\Models\Tramite');
    }

    public function eventos(){
        return $this->hasMany('App\Models\Evento');
    }

    public function noticia(){
        return $this->hasMany('App\Models\Noticia');
    }

    public function Report(){
        return $this->hasMany('App\Models\Report');
    }

    public function planificacion()
    {
        return $this->hasOne('App\Models\Planificacion');
    }

}
