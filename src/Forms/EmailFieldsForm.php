<?php

namespace Bites\Base\Forms;

use Bites\Base\Enums\EmailProviderEnum;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class EmailFieldsForm
{
    public static function get(): array
    {
        return [
            Forms\Components\Grid::make()
                ->schema([
                    Section::make([
                        Select::make('default_email_provider')
                            ->label(__('base::default.default_email_provider'))
                            ->native(false)
                            ->allowHtml()
                            ->preload()
                            ->options(function () {
                                $options = [];
                                foreach (EmailProviderEnum::options() as $key => $value) {
                                    if (file_exists(public_path('vendor/filament-general-settings/images/email-providers/'.strtolower($value).'.svg'))) {
                                        $options[strtolower($value)] = '<div class="flex gap-2">'.
                                            ' <img src="'.asset('vendor/filament-general-settings/images/email-providers/'.strtolower($value).'.svg').'"  class="h-5">'
                                            .$value
                                            .'</div>';
                                    } else {
                                        $options[strtolower($value)] = $value;
                                    }
                                }

                                return $options;
                            })
                            ->helperText(__('base::default.default_email_provider_helper_text'))
                            ->live()
                            ->columnSpanFull(),
                        Forms\Components\Group::make()
                            ->schema([
                                TextInput::make('smtp_host')
                                    ->label(__('base::default.host')),
                                TextInput::make('smtp_port')
                                    ->label(__('base::default.port')),
                                Select::make('smtp_encryption')
                                    ->label(__('base::default.encryption'))
                                    ->options([
                                        'ssl' => 'SSL',
                                        'tls' => 'TLS',
                                    ]),
                                TextInput::make('smtp_timeout')
                                    ->label(__('base::default.timeout')),
                                TextInput::make('smtp_username')
                                    ->label(__('base::default.username')),
                                TextInput::make('smtp_password')
                                    ->label(__('base::default.password')),
                            ])
                            ->columns(2)
                            ->visible(fn ($state) => $state['default_email_provider'] === 'smtp'),
                        Forms\Components\Group::make()
                            ->schema([
                                TextInput::make('mailgun_domain')
                                    ->label(__('base::default.mailgun_domain')),
                                TextInput::make('mailgun_secret')
                                    ->label(__('base::default.mailgun_secret')),
                                TextInput::make('mailgun_endpoint')
                                    ->label(__('base::default.mailgun_endpoint')),
                            ])
                            ->columns(1)
                            ->visible(fn ($state) => $state['default_email_provider'] === 'mailgun'),
                        Forms\Components\Group::make()
                            ->schema([
                                TextInput::make('postmark_token')
                                    ->label(__('base::default.postmark_token')),
                            ])
                            ->columns(1)
                            ->visible(fn ($state) => $state['default_email_provider'] === 'postmark'),
                        Forms\Components\Group::make()
                            ->schema([
                                TextInput::make('amazon_ses_key')
                                    ->label(__('base::default.amazon_ses_key')),
                                TextInput::make('amazon_ses_secret')
                                    ->label(__('base::default.amazon_ses_secret')),
                                TextInput::make('amazon_ses_region')
                                    ->label(__('base::default.amazon_ses_region'))
                                    ->default('us-east-1'),
                            ])
                            ->columns(1)
                            ->visible(fn ($state) => $state['default_email_provider'] === 'ses'),
                    ]),
                ])
                ->columnSpan(['lg' => 2]),
            Forms\Components\Grid::make()
                ->schema([
                    Section::make([
                        TextInput::make('email_from_name')
                            ->label(__('base::default.email_from_name'))
                            ->helperText(__('base::default.email_from_name_helper_text')),
                        TextInput::make('email_from_address')
                            ->label(__('base::default.email_from_address'))
                            ->helperText(__('base::default.email_from_address_helper_text'))
                            ->email(),
                    ]),
                    Section::make()
                        ->schema([
                            TextInput::make('mail_to')
                                ->label(fn () => __('base::default.mail_to'))
                                ->hiddenLabel()
                                ->placeholder(fn () => __('base::default.mail_to'))
                                ->reactive(),
                            Forms\Components\Actions::make([
                                Forms\Components\Actions\Action::make('Send Test Mail')
                                    ->label(fn () => __('base::default.send_test_email'))
                                    ->disabled(fn ($state) => empty($state['mail_to']))
                                    ->action('sendTestMail')
                                    ->icon('heroicon-o-paper-airplane'),
                            ])->fullWidth(),
                        ]),
                ])
                ->columnSpan(['lg' => 1]),
        ];
    }
}
