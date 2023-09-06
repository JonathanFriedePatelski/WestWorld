<?php

namespace App\Enums;

enum NarrativeLevel: string
{
    use EnumHasValues;

    case None     = 'none';
    case Peaceful = 'peaceful';
    case Neutral  = 'neutral';
    case Violent  = 'violent';
}
