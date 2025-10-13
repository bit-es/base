<?php

namespace Bites\Qas;

use Bites\Qas\Filament\Resources;
use Illuminate\Support\ServiceProvider;

class QasServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // dump('QasServiceProvider booted');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadViewsFrom(__DIR__ . '/../resources/views', 'bites');

    }

    public function register()
    {
        // dump('QasServiceProvider registered');
        $existing = config('bites.model_namespaces', []);
        $additional = ['Bites\\Qas\\Models\\'];
        config([
            'bites.model_namespaces' => array_values(array_unique(array_merge($existing, $additional))),
        ]);

    }
}
