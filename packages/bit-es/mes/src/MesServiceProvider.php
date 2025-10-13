<?php

namespace Bites\Mes;

use Bites\Mes\Filament\Resources;
use Illuminate\Support\ServiceProvider;

class MesServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // dump('MesServiceProvider booted');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadViewsFrom(__DIR__ . '/../resources/views', 'bites');

    }

    public function register()
    {
        // dump('MesServiceProvider registered');
        $existing = config('bites.model_namespaces', []);
        $additional = ['Bites\\Mes\\Models\\'];
        config([
            'bites.model_namespaces' => array_values(array_unique(array_merge($existing, $additional))),
        ]);

    }
}
