<?php

namespace Bites\Eam\Providers;

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

class EamPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('eam')
            ->path('eam')
            ->brandName('Asset Management Panel')
            ->login()
            ->colors([
                'primary' => Color::Sky,
            ])
            ->discoverResources(in: app_path('Filament/Eam/Resources'), for: 'App\Filament\Eam\Resources')
            ->resources([
                \Bites\Eam\Resources\Assets\AssetResource::class,
                \Bites\Eam\Resources\AssetTypes\AssetTypeResource::class,
                \Bites\Eam\Resources\Contracts\ContractResource::class,
                \Bites\Eam\Resources\InventoryItems\InventoryItemResource::class,
                \Bites\Eam\Resources\JobPlans\JobPlanResource::class,
                \Bites\Eam\Resources\PurchaseOrders\PurchaseOrderResource::class,
                \Bites\Eam\Resources\WorkOrders\WorkOrderResource::class,
            ])
            ->discoverPages(in: app_path('Filament/Eam/Pages'), for: 'App\Filament\Eam\Pages')
            ->pages([
                Dashboard::class,
            ])
            // ->topNavigation()
            ->discoverWidgets(in: app_path('Filament/Eam/Widgets'), for: 'App\Filament\Eam\Widgets')
            ->widgets([
                // AccountWidget::class,
                // FilamentInfoWidget::class,
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
