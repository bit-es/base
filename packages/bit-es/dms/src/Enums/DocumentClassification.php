<?php

namespace Bites\Dms\Enums;

use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasLabel;

enum DocumentClassification: string implements HasDescription
{
    case L1 = 'L1';
    case L2 = 'L2';
    case L3 = 'L3';
    case L4 = 'L4';

    public function getDescription(): ?string
    {
        return match ($this) {
            self::L1 => 'Public, intended for public viewing',
            self::L2 => 'Internal, most of the day-to-day operational information for viewing by all staff only',
            self::L3 => 'Confidential, sensitive information meant to be only viewed by selected groups of staff',
            self::L4 => 'Highly Confidential, sensitive information meant to be only viewed by selected staff',
        };
    }
}
