<?php

namespace Bites\Base\Pages;

use Filament\Actions;
use Filament\Facades\Filament;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Bites\Base\Forms\AnalyticsFieldsForm;
use Bites\Base\Forms\ApplicationFieldsForm;
use Bites\Base\Forms\CustomForms;
use Bites\Base\Forms\EmailFieldsForm;
use Bites\Base\Forms\SeoFieldsForm;
use Bites\Base\Forms\SocialNetworkFieldsForm;
use Bites\Base\Helpers\EmailDataHelper;
use Bites\Base\Mail\TestMail;
use Bites\Base\Models\GeneralSetting;
use Bites\Base\Services\MailSettingsService;

class BasePage extends Page
{
    protected static string $view = 'base::filament.pages.general-settings-page';

    /**
     * @throws \Exception
     */
    public static function getNavigationGroup(): ?string
    {
        $plugin = Filament::getCurrentPanel()?->getPlugin('base');

        return $plugin->getNavigationGroup();
    }

    /**
     * @throws \Exception
     */
    public static function getNavigationIcon(): ?string
    {
        $plugin = Filament::getCurrentPanel()?->getPlugin('base');

        return $plugin->getIcon();
    }

    public static function getNavigationSort(): ?int
    {
        $plugin = Filament::getCurrentPanel()?->getPlugin('base');

        return $plugin->getSort();
    }

    public static function canAccess(): bool
    {
        $plugin = Filament::getCurrentPanel()?->getPlugin('base');

        return $plugin->getCanAccess();
    }

    public function getTitle(): string
    {
        $plugin = Filament::getCurrentPanel()?->getPlugin('base');

        return $plugin->getTitle() ?? __('base::default.title');
    }

    public static function getNavigationLabel(): string
    {
        $plugin = Filament::getCurrentPanel()?->getPlugin('base');

        return $plugin->getNavigationLabel() ?? __('base::default.title');
    }

    public ?array $data = [];

    public function mount(): void
    {
        $this->data = collect(config('base'))->toArray();

        $this->data['seo_description'] = $this->data['seo_description'] ?? '';
        $this->data['seo_preview'] = $this->data['seo_preview'] ?? '';
        $this->data['pr_color'] = $this->data['pr_color'] ?? '';
        $this->data['bg_color'] = $this->data['bg_color'] ?? '';
        $this->data['seo_metadata'] = $this->data['seo_metadata'] ?? [];
        $this->data = EmailDataHelper::getEmailConfigFromDatabase($this->data);

        if (isset($this->data['site_logo']) && is_string($this->data['site_logo'])) {
            $this->data['site_logo'] = [
                'name' => $this->data['site_logo'],
            ];
        }

        if (isset($this->data['site_favicon']) && is_string($this->data['site_favicon'])) {
            $this->data['site_favicon'] = [
                'name' => $this->data['site_favicon'],
            ];
        }

        $this->data['more_configs'] = $this->data['more_configs'] ?? [];
    }

    public function form(Form $form): Form
    {
        $arrTabs = [];

        if (config('base.show_application_tab')) {
            $arrTabs[] = Tabs\Tab::make('Application Tab')
                ->label(__('base::default.application'))
                ->icon('heroicon-o-tv')
                ->schema(ApplicationFieldsForm::get())
                ->columns(3);
        }

        if (config('base.show_analytics_tab')) {
            $arrTabs[] = Tabs\Tab::make('Analytics Tab')
                ->label(__('base::default.analytics'))
                ->icon('heroicon-o-globe-alt')
                ->schema(AnalyticsFieldsForm::get());
        }

        if (config('base.show_seo_tab')) {
            $arrTabs[] = Tabs\Tab::make('Seo Tab')
                ->label(__('base::default.seo'))
                ->icon('heroicon-o-window')
                ->schema(SeoFieldsForm::get($this->data))
                ->columns(1);
        }

        if (config('base.show_email_tab')) {
            $arrTabs[] = Tabs\Tab::make('Email Tab')
                ->label(__('base::default.email'))
                ->icon('heroicon-o-envelope')
                ->schema(EmailFieldsForm::get())
                ->columns(3);
        }

        if (config('base.show_social_networks_tab')) {
            $arrTabs[] = Tabs\Tab::make('Social Network Tab')
                ->label(__('base::default.social_networks'))
                ->icon('heroicon-o-heart')
                ->schema(SocialNetworkFieldsForm::get())
                ->columns(2)
                ->statePath('social_network');
        }

        if (config('base.show_custom_tabs')) {
            foreach (config('base.custom_tabs') as $key => $customTab) {
                $arrTabs[] = Tabs\Tab::make($customTab['label'])
                    ->label(__($customTab['label']))
                    ->icon($customTab['icon'])
                    ->schema(CustomForms::get($customTab['fields']))
                    ->columns($customTab['columns'])
                    ->statePath('more_configs');
            }
        }

        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->tabs($arrTabs),
            ])
            ->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            Actions\Action::make('Save')
                ->label(__('base::default.save'))
                ->color('primary')
                ->submit('Update'),
        ];
    }

    public function update(): void
    {
        $data = $this->form->getState();
        if (config('base.show_email_tab')) {
            $data = EmailDataHelper::setEmailConfigToDatabase($data);
        }
        $data = $this->clearVariables($data);

        GeneralSetting::updateOrCreate([], $data);
        Cache::forget('general_settings');

        $this->successNotification(__('base::default.settings_saved'));
        redirect(request()?->header('Referer'));
    }

    private function clearVariables(array $data): array
    {
        unset(
            $data['seo_preview'],
            $data['seo_description'],
            $data['default_email_provider'],
            $data['smtp_host'],
            $data['smtp_port'],
            $data['smtp_encryption'],
            $data['smtp_timeout'],
            $data['smtp_username'],
            $data['smtp_password'],
            $data['mailgun_domain'],
            $data['mailgun_secret'],
            $data['mailgun_endpoint'],
            $data['postmark_token'],
            $data['amazon_ses_key'],
            $data['amazon_ses_secret'],
            $data['amazon_ses_region'],
            $data['mail_to'],
        );

        return $data;
    }

    public function sendTestMail(MailSettingsService $mailSettingsService): void
    {
        $data = $this->form->getState();
        $email = $data['mail_to'];

        $settings = $mailSettingsService->loadToConfig($data);

        try {
            Mail::mailer($settings['default_email_provider'])
                ->to($email)
                ->send(new TestMail([
                    'subject' => 'This is a test email to verify SMTP settings',
                    'body' => 'This is for testing email using smtp.',
                ]));
        } catch (\Exception $e) {
            $this->errorNotification(__('base::default.test_email_error'), $e->getMessage());

            return;
        }

        $this->successNotification(__('base::default.test_email_success').$email);
    }

    private function successNotification(string $title): void
    {
        Notification::make()
            ->title($title)
            ->success()
            ->send();
    }

    private function errorNotification(string $title, string $body): void
    {
        Log::error('[EMAIL] '.$body);

        Notification::make()
            ->title($title)
            ->danger()
            ->body($body)
            ->send();
    }
}
