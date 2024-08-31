<?php

namespace App\Http\Middleware;

use App\Models\LogAcesso;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        //dd($request);
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create(['log'=> "IP: $ip acessou a rota: $rota"]);
        //return Response("IP: $ip acessou a rota: $rota");
        //return $next($request);
        $resposta = $next($request);

        $resposta->setStatusCode(201, 'created');
        //dd($reposta);
        return $resposta;
    }
}
