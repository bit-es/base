<?php

namespace Bites\Base\Forms;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class ApplicationFieldsForm
{
    public static function get(): array
    {
        return [
            TextInput::make('site_name')
                ->label(__('base::default.site_name'))
                ->autofocus()
                ->columnSpanFull(),
            Textarea::make('site_description')
                ->label(__('base::default.site_description'))
                ->columnSpanFull(),
            Grid::make()->schema([
                FileUpload::make('site_logo')
                    ->label(fn() => __('base::default.site_logo'))
                    ->image()
                    ->directory('assets')
                    ->visibility('public')
                    ->moveFiles()
                    ->imageEditor()
                    ->getUploadedFileNameForStorageUsing(fn() => 'site_logo.png')
                    ->columnSpan(2),
                FileUpload::make('site_favicon')
                    ->label(fn() => __('base::default.site_favicon'))
                    ->image()
                    ->directory('assets')
                    ->visibility('public')
                    ->moveFiles()
                    ->getUploadedFileNameForStorageUsing(fn() => 'site_favicon.ico')
                    ->acceptedFileTypes(['image/x-icon', 'image/vnd.microsoft.icon'])
                    ->columnSpan(2),
            ])
                ->columns(4)
                ->visible(fn() => config('base.show_logo_and_favicon')),
            TextInput::make('support_email')
                ->label(__('base::default.support_email'))
                ->prefixIcon('heroicon-o-envelope'),
            TextInput::make('support_phone')
                ->prefixIcon('heroicon-o-phone')
                ->label(__('base::default.support_phone')),
            ColorPicker::make('p_color')
                ->label(__('base::default.pr_color'))
                ->prefixIcon('heroicon-o-swatch')
                ->formatStateUsing(fn(?string $state): string => $state ?? config('filament.theme.colors.primary'))
                ->helperText(__('base::default.pr_color_helper_text')),
            ColorPicker::make('b_color')
                ->label(__('base::default.bg_color'))
                ->prefixIcon('heroicon-o-swatch')
                ->formatStateUsing(fn(?string $state): string => $state ?? config('filament.theme.colors.gray'))
                ->helperText(__('base::default.bg_color_helper_text')),
        ];
    }
}
