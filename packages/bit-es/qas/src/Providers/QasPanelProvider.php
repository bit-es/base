<?php

namespace Bites\Qas\Providers;

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

class QasPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('qas')
            ->path('qas')
            ->brandName('Quality Assurance')
            ->login()
            ->colors([
                'primary' => Color::Rose,
            ])
            ->discoverResources(in: app_path('Filament/Qas/Resources'), for: 'App\Filament\Qas\Resources')
            ->resources([
                \Bites\Qas\Resources\Inspections\InspectionResource::class,
                \Bites\Qas\Resources\NonConformities\NonConformityResource::class,
                \Bites\Qas\Resources\CorrectiveActions\CorrectiveActionResource::class,
                \Bites\Qas\Resources\QualityStandards\QualityStandardResource::class,
            ])
            ->discoverPages(in: app_path('Filament/Qas/Pages'), for: 'App\Filament\Qas\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Qas/Widgets'), for: 'App\Filament\Qas\Widgets')
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
