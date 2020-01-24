<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Código para deixar passar qualquer request, porém configurando quem pode passar (da forma que está abaixo, resolvemos aquele problema com o Cors)
        return $next($request)
        ->header('Access-Control-Allow-Origin', '*') //aqui estou liberando qualquer origin, mas poderia especificar os sites que poderiam consumir minha API
        ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS') //aqui específico que métodos vou liberar
        ->header('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, X-Token-Auth, Authorization'); //aqui estamos falando de autenticação, posso passar o valor da chave de autenticação
    }
}
