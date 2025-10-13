<?php

namespace Bites\Mes\Providers;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class MesPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('mes')
            ->path('mes')
            ->brandName('MES')
            ->login()
            ->colors([
                'primary' => Color::Fuchsia,
            ])
            ->discoverResources(in: app_path('Filament/Mes/Resources'), for: 'App\Filament\Mes\Resources')
            ->resources([
                \Bites\Mes\Resources\Materials\MaterialResource::class,
                \Bites\Mes\Resources\Operations\OperationResource::class,
                \Bites\Mes\Resources\ProductionOrders\ProductionOrderResource::class,
                \Bites\Mes\Resources\ProductionLogs\ProductionLogResource::class,
                \Bites\Mes\Resources\WorkCenters\WorkCenterResource::class,
            ])
            ->discoverPages(in: app_path('Filament/Mes/Pages'), for: 'App\Filament\Mes\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Mes/Widgets'), for: 'App\Filament\Mes\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
