<?php

namespace Bites\Erp;

use Bites\Erp\Filament\Resources;
use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;




class ErpServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // dump('ErpServiceProvider booted');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        // $this->loadViewsFrom(__DIR__ . '/../resources/views', 'bites');






    }
    public function register()
    {
        // dump('ErpServiceProvider registered');
        $existing = config('bites.model_namespaces', []);
        $additional = ['Bites\\Erp\\Models\\'];
        config([
            'bites.model_namespaces' => array_values(array_unique(array_merge($existing, $additional))),
        ]);

    }
}





























