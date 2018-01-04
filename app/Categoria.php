<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    
    public function rules()
    {
    	return [
    		'nome' => 'required|string|max:255',
    	];
    }
    public function noticias()
    {
    	return $this->belongsToMany('App\Noticia', 'noticias_categorias', 'categoria_id', 'noticia_id');
    }
}
