@php
    $user = filament()?->auth()?->user();
    $roles = $user?->roles?->pluck('name')?->join(', ') ?? 'No roles';
    $now = \Carbon\Carbon::now()->format('l, F j, Y g:i:s A');
    $staff = $user?->staff;
@endphp

<x-filament-widgets::widget class="fi-account-widget">
    <x-filament::section>
        <div class="flex items-center gap-x-3">
            <x-filament-panels::avatar.user size="lg" :user="$user" />

            <div class="flex-1">
                <h2 class="grid flex-1 text-base font-semibold leading-6 text-gray-950 dark:text-white">
                    {{ __('filament-panels::widgets/account-widget.welcome', ['app' => config('app.name')]) }}
                </h2>
                <p class="text-sm text-primary dark:text-primary-dark">
                    {{ filament()?->getUserName($user) ?? 'Guest' }}
                    [{{ $staff?->staff_number ?? 'N/A' }}]
                    <br><i class="text-gray-500 dark:text-gray-400">as</i>
                    {{ $staff?->job_post?->title ?? 'Unknown Role' }}
                    <br><i class="text-gray-500 dark:text-gray-400">in</i>
                    {{ $staff?->job_post?->attributes()?->where('key', 'department')->value('value') ?? 'Unknown Department' }}
                </p>
            </div>
            <div class="flex-1">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ $roles }}

                </p>
            </div>
            <div class="text-right">
                <p class="text-sm py-4 text-gray-500 dark:text-gray-400">
                    {{ $now }}
                </p>
                <form action="{{ filament()->getLogoutUrl() }}" method="post" class="my-auto">
                    @csrf

                    <x-filament::button color="gray" icon="heroicon-m-arrow-left-on-rectangle"
                        icon-alias="panels::widgets.account.logout-button" labeled-from="sm" tag="button"
                        type="submit">
                        {{ __('filament-panels::widgets/account-widget.actions.logout.label') }}
                    </x-filament::button>
                </form>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
