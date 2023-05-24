<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MyFirstMiddleware
{
    private $users;
    public function __construct(User $users)
    {
        $this->users = $users;
    }
/**
 * $role = para verificar se é admin, vai como parametro na declaração
 * da rota com o middleware ->  '<Middleware>:<param>'
 */
    public function handle(Request $request, Closure $next, $role): Response
    {

        dd($role);
        //if (!Auth::check())
        $response = $next($request);

        if ($this->users->count() === 8)
            return $response;
        dd('Existem mais ou menos que 8 usuários');
    }
}
