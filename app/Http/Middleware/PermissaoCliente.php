<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class PermissaoCliente
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
        //O usuario não é cliente do sistema?
        if(!Auth::user()->verificaCliente()){
            session([
                'mensagem' => 'Você precisa ser cliente para isso.'
            ]);         
            return redirect('/'); //Se ele nao for, apenas volta pra pagina anterior
        }else{
            return $next($request); //Se ele for o Middleware continua
        }
    }
}
