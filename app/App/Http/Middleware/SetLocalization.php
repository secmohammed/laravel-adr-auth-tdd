<?php


namespace App\App\Http\Middleware;
use Closure;

class SetLocalization
{

    public function handle($request, Closure $next)
    {
        if ($request->has('lang') && in_array($request->lang, config('app.locales'))) {
            config(['app.locale' => $request->lang]);
        }
        return $next($request);
    }
}
