<?php

namespace Bites\Base\Middleware;

use Closure;
use Filament\Support\Colors\Color;
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
        FilamentColor::register([
            'primary' => Color::hex(config('base.p_color')),
            'gray' => Color::hex(config('base.g_color')),
            'danger' => Color::hex(config('base.d_color')),
            'info' => Color::hex(config('base.i_color')),
            'success' => Color::hex(config('base.s_color')),
            'warning' => Color::hex(config('base.w_color')),
        ]);

        return $next($request);
    }
}
