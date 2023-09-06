<?php

namespace App\Enums;

enum POIType: string
{
    use EnumHasValues;

    case Landmark = 'landmark';
    case Facility = 'facility';
    case Town     = 'town';
    case Region   = 'region';
    case None     = 'none';
}
