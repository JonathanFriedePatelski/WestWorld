<?php

namespace App\Enums;

enum IncidentSeverity: string
{
    use EnumHasValues;

    case Critical = 'Critical';
    case High     = 'High';
    case Medium   = 'Medium';
    case Low      = 'Low';
}
