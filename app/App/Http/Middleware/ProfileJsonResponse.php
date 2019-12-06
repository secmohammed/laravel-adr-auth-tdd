<?php
namespace App\App\Http\Middleware;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;

class ProfileJsonResponse
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
        $response = $next($request);
        if ($response instanceof JsonResponse && app('debugbar')->isEnabled() && $request->has('_debug')) {
            $sqlQueries = app('debugbar')->getData(true)['queries'];
            $sqlQueries['statements'] = array_map(function ($value) {
                return $value['sql'];
            }, $sqlQueries['statements']);
            $response->setData($response->getData(true) + [
                    '_debugbar' => array_merge($sqlQueries['statements'],Arr::only(app('debugbar')->getData(), [ 'memory'])),
                    ]);
        }
        return $response;
    }
}
