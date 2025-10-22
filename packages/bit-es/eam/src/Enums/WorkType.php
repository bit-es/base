<?php

namespace Bites\Eam\Enums;

enum WorkType: string
{
    case PM = 'PreventiveMaintenance';
    case CM = 'ChangeMaintenance';
    case EM = 'EmergencyMaintenance';
    case INSP = 'Inspection';
}
