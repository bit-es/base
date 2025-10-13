<?php

namespace Bites\Erp\Enums;

enum OrderStatus: string
{
    case Planned = 'Planned';
    case In_Progress = 'In_Progress';
    case Completed = 'Completed';
    case Cancelled = 'Cancelled';
}



























