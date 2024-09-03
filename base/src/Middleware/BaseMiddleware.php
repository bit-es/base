<?php

namespace Bites\Base\Middleware;

use Closure;
use Filament\Support\Facades\FilamentColor;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        FilamentColor::register(['primary' => config(['base.p_color'])]);
        FilamentColor::register(['gray' => config(['base.g_color'])]);
        FilamentColor::register(['danger' => config(['base.d_color'])]);
        FilamentColor::register(['info' => config(['base.i_color'])]);
        FilamentColor::register(['success' => config(['base.s_color'])]);
        FilamentColor::register(['warning' => config(['base.w_color'])]);

        return $next($request);
    }
}
