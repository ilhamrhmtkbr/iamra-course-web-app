<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AppLocaleMiddleware
{
    public function handle(Request $request, \Closure $next)
    {
        $locale = $request->header('Accept-Language', $request->query('lang', 'en'));

        if (in_array($locale, ['en', 'id'])) {
            App::setLocale($locale);
        }

        return $next($request);
    }
}
