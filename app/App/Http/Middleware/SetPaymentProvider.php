<?php

namespace App\App\Http\Middleware;

use Closure;

class SetPaymentProvider
{
    public function handle($request, Closure $next)
    {
        if ($request->paymentProvider) {
            if (in_array($request->paymentProvider, config('payment.providers'))) {
                config(['payment.provider' => $request->paymentProvider]);
            } else {
                return response()->json([
                    'message' => 'UnKnown Payment Provider',
                ], 403);
            }
        }
        return $next($request);
    }
}
