<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    
    public function rules()
    {
    	return [
    		'titulo' => 'required|max:255',
    		'corpo' => 'required',
    	];
    }
    public function usuario()
    {
    	return $this->belongsTo('App\User', 'usuario_id');
    }

    public function categorias()
    {
        return $this->belongsToMany('App\Categoria', 'noticias_categorias', 'noticia_id', 'categoria_id');
    }

}
