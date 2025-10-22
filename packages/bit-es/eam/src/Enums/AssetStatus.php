<?php

namespace Bites\Eam\Enums;

enum AssetStatus: string
{
    case Commissioning = 'Commissioning';
    case InUse = 'InUse';
    case UnderMaintenance = 'UnderMaintenance';
    case Repairing = 'Repairing';
    case Overhauling = 'Overhauling';
    case Disposed = 'Disposed';
}
