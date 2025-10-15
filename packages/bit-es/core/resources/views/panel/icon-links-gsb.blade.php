@php
    $currentRoute = request()->route()->getName();
    $routeParts = explode('.', $currentRoute);

    // Join the first two parts to get the panel prefix
    $currentPanel = count($routeParts) > 1 ? implode('.', array_slice($routeParts, 0, 2)) . '.' : '';

    // Get the remaining part of the route
    $currentKB = count($routeParts) > 2 ? implode('.', array_slice($routeParts, 2)) : '';

    // Get the icon from the configuration file
    $icons = config('bites-base.service-menu.icons');
@endphp

<x-filament::icon-button icon="myicon-p-lobby" href="{{ route('filament.lobby.pages.dashboard') }}" tag="a"
    color="{{ $currentRoute == 'filament.lobby.pages.dashboard' ? 'primary' : 'gray' }}" tooltip="{{ __('Lobby') }}" />
<x-filament::icon-button icon="myicon-p-home" href="{{ route('filament.staff.pages.dashboard') }}" tag="a"
    color="{{ $currentRoute == 'filament.staff.pages.dashboard' ? 'primary' : 'gray' }}"
    tooltip="{{ __('Staff Portal') }}" />
<x-filament::icon-button icon="myicon-p-dms" href="{{ route('filament.dms.pages.dashboard') }}" tag="a"
    color="{{ $currentRoute == 'filament.dms.pages.dashboard' ? 'primary' : 'gray' }}"
    tooltip="{{ __('Document Panel') }}" />
<x-filament::icon-button icon="myicon-p-eam" href="{{ route('filament.eam.pages.dashboard') }}" tag="a"
    color="{{ $currentRoute == 'filament.eam.pages.dashboard' ? 'primary' : 'gray' }}"
    tooltip="{{ __('Asset Panel') }}" />
<x-filament::icon-button icon="myicon-p-erp" href="{{ route('filament.erp.pages.dashboard') }}" tag="a"
    color="{{ $currentRoute == 'filament.erp.pages.dashboard' ? 'primary' : 'gray' }}"
    tooltip="{{ __('ERP Panel') }}" />
<x-filament::icon-button icon="myicon-p-hrm" href="{{ route('filament.hrm.pages.dashboard') }}" tag="a"
    color="{{ $currentRoute == 'filament.hrm.pages.dashboard' ? 'primary' : 'gray' }}"
    tooltip="{{ __('HR Panel') }}" />
<x-filament::icon-button icon="myicon-p-lms" href="{{ route('filament.lms.pages.dashboard') }}" tag="a"
    color="{{ $currentRoute == 'filament.lms.pages.dashboard' ? 'primary' : 'gray' }}"
    tooltip="{{ __('LMS Panel') }}" />
<x-filament::icon-button icon="myicon-p-mes" href="{{ route('filament.mes.pages.dashboard') }}" tag="a"
    color="{{ $currentRoute == 'filament.mes.pages.dashboard' ? 'primary' : 'gray' }}"
    tooltip="{{ __('MES Panel') }}" />
<x-filament::icon-button icon="myicon-p-qas" href="{{ route('filament.qas.pages.dashboard') }}" tag="a"
    color="{{ $currentRoute == 'filament.qas.pages.dashboard' ? 'primary' : 'gray' }}"
    tooltip="{{ __('QAS Panel') }}" />
