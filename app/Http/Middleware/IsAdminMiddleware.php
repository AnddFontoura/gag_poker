<?php

namespace App\Http\Middleware;

use App\Http\Service\IsAdminService;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if(!IsAdminService::isAdminCheck(Auth::id())) {
            return redirect(RouteServiceProvider::HOME)->with('error', 'Você não tem permissão para acessar essa url');
        }
        return $next($request);
    }
}
