<?php

namespace Bites\Core\Providers;

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
use Illuminate\View\View;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Filament\Support\Facades\FilamentIcon;
use Filament\View\PanelsIconAlias;

class CorePanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('core')
            ->path('core')
            ->brandName('Administration')
            ->login()
            ->renderHook('panels::auth.login.form.after', fn(): View => view('bites::panel.extra'))
            ->default()
            ->colors([
                'primary' => Color::Yellow,
            ])
            ->discoverResources(in: app_path('Filament/Core/Resources'), for: 'App\Filament\Core\Resources')
            ->resources([
                \Bites\Core\Resources\Classifies\ClassifyResource::class,
                \Bites\Core\Resources\Settings\SettingResource::class,
                \Bites\Core\Resources\Companies\CompanyResource::class,
                \Bites\Core\Resources\FilaPanels\FilaPanelResource::class,
                \Bites\Core\Resources\JobPositions\JobPositionResource::class,
                \Bites\Core\Resources\Locations\LocationResource::class,
                \Bites\Core\Resources\OrgUnits\OrgUnitResource::class,
                \Bites\Core\Resources\Turtles\TurtleResource::class,
                \Bites\Core\Resources\OrgRoles\OrgRoleResource::class,
                \Bites\Core\Resources\Documents\DocumentResource::class,
            ])
            ->discoverPages(in: app_path('Filament/Core/Pages'), for: 'App\Filament\Core\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Core/Widgets'), for: 'App\Filament\Core\Widgets')
            ->widgets([
                AccountWidget::class,
                // FilamentInfoWidget::class,
                \Bites\Core\Widgets\QuickView::class,
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
    public function boot()
    {
        FilamentView::registerRenderHook(
            PanelsRenderHook::USER_MENU_BEFORE,
            fn(): View => view('bites::panel.icon-links-umb'),
        );
        FilamentView::registerRenderHook(
            PanelsRenderHook::GLOBAL_SEARCH_BEFORE,
            fn(): View => view('bites::panel.icon-links-gsb'),
        );
        FilamentIcon::register([
            PanelsIconAlias::PAGES_DASHBOARD_NAVIGATION_ITEM => 'myicon-dashboard',
        ]);
    }
}
