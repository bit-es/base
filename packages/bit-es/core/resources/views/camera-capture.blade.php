@php
    $statePath = $getStatePath();
@endphp

<div
    x-data="{ open: false, imagePath: @entangle($statePath) }"
    class="space-y-2"
>
    <div class="flex items-center gap-2">
        <input type="text" class="fi-input fi-input-text w-full" x-model="imagePath" readonly>

        <x-filament::button color="primary" type="button" x-on:click="open = true">
            Capture
        </x-filament::button>
    </div>

<x-filament::modal
    id="cameraCaptureModal"
    x-show="open"
    x-on:close="open = false"
    width="2xl"
>
    <bites::camera-capture-modal
        :wire:key="'camera-capture-' . $getStatePath()"
        wire:model="imagePath"
/>
</x-filament::modal>
</div>
