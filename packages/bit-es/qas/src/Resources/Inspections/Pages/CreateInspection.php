<?php

namespace Bites\Qas\Resources\Inspections\Pages;

use Bites\Qas\Resources\Inspections\InspectionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateInspection extends CreateRecord
{
    protected static string $resource = InspectionResource::class;

    public function openScanner()
    {
        $this->dispatchBrowserEvent('open-qr-scanner');
    }
}
