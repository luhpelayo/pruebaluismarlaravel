<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Norma extends Model
{
    protected $table = 'normas';
    protected $fillable = ['tipo_norma','nombre', 'url_document'];
}
