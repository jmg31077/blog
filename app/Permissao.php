<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permissao extends Model
{
    protected $table = 'permissoes';

    public function funcoes()
    {
        return $this->belongsToMany('App\Funcao', 'funcoes_permissoes', 'permissao_id', 'funcao_id');
    }
}
