<?php

namespace Bites\Eam;

use Bites\Eam\Filament\Resources;
use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;




class EamServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // dump('EamServiceProvider booted');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        // $this->loadViewsFrom(__DIR__ . '/../resources/views', 'bites');






    }
    public function register()
    {
        // dump('EamServiceProvider registered');
        $existing = config('bites.model_namespaces', []);
        $additional = ['Bites\\Eam\\Models\\'];
        config([
            'bites.model_namespaces' => array_values(array_unique(array_merge($existing, $additional))),
        ]);

    }
}





























