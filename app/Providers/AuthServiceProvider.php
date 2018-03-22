<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Permissao;
use App\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $permissoes = Permissao::with('funcoes')->get();
        foreach($permissoes as $permissao){
            Gate::define($permissao->nome, function(User $usuario) use ($permissao){
                    return $usuario->temPermissao($permissao);
            });

            Gate::before(function(User $usuario){
                if($usuario->temAlgumaFuncao('administrador')){
                    return true;
                }
            });
        }
    }
}
