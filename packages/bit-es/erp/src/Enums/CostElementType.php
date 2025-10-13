<?php

namespace Bites\Erp\Enums;

use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasLabel;

enum CostElementType: string implements HasDescription
{
    case PrimaryMaterial = 'primary_material';
    case PrimaryPersonnel = 'primary_personnel';
    case PrimaryService = 'primary_service';
    case PrimaryEnergy = 'primary_energy';
    case PrimaryDepreciation = 'primary_depreciation';
    case PrimaryRevenue = 'primary_revenue';
    case SecondaryActivity = 'secondary_activity';
    case SecondaryAssessment = 'secondary_assessment';
    case SecondarySettlement = 'secondary_settlement';
    case SecondaryOverhead = 'secondary_overhead';
    case Statistical = 'statistical';
    public function getDescription(): ?string
    {
        return match ($this) {
            self::PrimaryMaterial => 'Costs of raw materials and components used in production.',
            self::PrimaryPersonnel => 'Employee-related costs such as wages, salaries, and benefits.',
            self::PrimaryService => 'Costs of outsourced or third-party services.',
            self::PrimaryEnergy => 'Utility costs including electricity, fuel, and water.',
            self::PrimaryDepreciation => 'Depreciation expenses for fixed assets.',
            self::PrimaryRevenue => 'Revenue-related cost elements for financial tracking.',
            self::SecondaryActivity => 'Internal costs for activity-based allocations.',
            self::SecondaryAssessment => 'Costs allocated through assessment cycles.',
            self::SecondarySettlement => 'Costs settled internally between cost objects.',
            self::SecondaryOverhead => 'Overhead costs distributed across departments.',
            self::Statistical => 'Informational cost elements used for reporting only.',
        };
    }
}

