<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $table = 'noticias';
    protected $fillable = ['title', 'url_img', 'url_document', 'precontent','content', 'auth','user_id'];

    public function user(){
    	return $this->belongsTo('App\Models\User');
    }
}
