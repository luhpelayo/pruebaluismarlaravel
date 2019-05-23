<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Procedimiento extends Model
{
    protected $table = 'procedimientos';
    protected $fillable = ['nombre', 'url_img','url_document', 'content'];
}
