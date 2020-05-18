<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class PermissaoAdmin
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
        //O usuario não é administrador do sistema?
        if(!Auth::user()->verificaAdmin()){
            session([
                'mensagem' => 'Você não possui permissão para isso.'
            ]);         
            return redirect('/'); //Se ele nao for, apenas volta pra pagina anterior
        }

        return $next($request); //Se ele for o Middleware continua
    }
}
