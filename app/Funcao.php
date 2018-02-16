<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcao extends Model
{
    protected $table = 'funcoes';

    public function usuarios()
    {
        return $this->belongsToMany('App\User', 'usuarios_funcoes', 'funcao_id', 'usuario_id');
    }

    public function permissoes()
    {
        return $this->belongsToMany('App\Permissao', 'funcoes_permissoes', 'funcao_id', 'permissao_id');
    }
}
