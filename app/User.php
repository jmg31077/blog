<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Validation\Rule;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function rulesForUpate()
    {
        return [
            'nome' => 'required|max:255',
            'email' => [Rule::unique('users', 'email')->ignore($this->id), 'email', 'required', 'max:255']
        ];
    }

    public function noticias()
    {
        return $this->hasMany('App\Noticia', 'usuario_id');
    }

    public function funcoes()
    {
        return $this->belongsToMany('App\Funcao', 'usuarios_funcoes', 'usuario_id', 'funcao_id');
    }
    
}
