<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Define o locale a partir da sessão (pt_BR, en, es).
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->session()->get('locale', 'pt_BR');

        if (is_string($locale) && in_array($locale, ['pt_BR', 'en', 'es'], true)) {
            app()->setLocale($locale);
        }

        return $next($request);
    }
}

