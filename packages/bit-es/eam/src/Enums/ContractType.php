<?php

namespace Bites\Eam\Enums;

use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasLabel;

enum ContractType: string implements HasLabel, HasDescription
{
    case WARRANTY = 'warranty';
    case LICENSE = 'license';
    case SLA = 'sla';
    case MAINTENANCE = 'maintenance';
    case LEASE = 'lease';
    case PROCUREMENT = 'procurement';
    case SUPPORT = 'support';
    case INSURANCE = 'insurance';
    case COMPLIANCE = 'compliance';
    public function getLabel(): ?string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return match ($this) {
            self::WARRANTY => 'Coverage for defects or failures',
            self::LICENSE => 'Software or IP usage rights',
            self::SLA => 'Service performance expectations',
            self::MAINTENANCE => 'Preventive/corrective/predictive services',
            self::LEASE => 'Rental terms for leased assets',
            self::PROCUREMENT => 'Purchase agreements',
            self::SUPPORT => 'Technical or operational support',
            self::INSURANCE => 'Coverage for loss/damage/liability',
            self::COMPLIANCE => 'Regulatory adherence (ISO, OSHA)',
        };
    }
}
