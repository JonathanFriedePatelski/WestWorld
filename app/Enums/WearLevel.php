<?php

namespace App\Enums;

enum WearLevel: string
{
    use EnumHasValues;

    case FactoryNew    = 'factory new';
    case MinimalWear   = 'minimal wear';
    case FieldTested   = 'field-tested';
    case WellWorn      = 'well-worn';
    case BattleScarred = 'battle-scarred';
}
