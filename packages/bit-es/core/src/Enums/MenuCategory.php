<?php

namespace Bites\Core\Enums;

enum MenuCategory: string
{
    case Profile = 'Profile';
    case Availability = 'Availability';
    case CnB = 'C&B';
    case LnD = 'L&D';
    case Help = 'Help';
    case Knowledge = 'Knowledge';
    case Performance = 'Performance';
    case Access = 'Access';
    case Insights = 'Insights';
    case Team = 'Team';
    case Approvals = 'Approvals';
    case Workforce = 'Workforce';
}
