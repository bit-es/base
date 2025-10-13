<?php

namespace Bites\Dms;

use Bites\Dms\Filament\Resources;
use Illuminate\Support\ServiceProvider;

class DmsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // dump('DmsServiceProvider booted');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadViewsFrom(__DIR__ . '/../resources/views', 'bites');

    }

    public function register()
    {
        // dump('DmsServiceProvider registered');
        $existing = config('bites.model_namespaces', []);
        $additional = ['Bites\\Dms\\Models\\'];
        config([
            'bites.model_namespaces' => array_values(array_unique(array_merge($existing, $additional))),
        ]);

    }
}
