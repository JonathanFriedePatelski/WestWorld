<?php

namespace App\Enums;

enum IncidentType: string
{
    use EnumHasValues;

    case NarrativeEnded   = 'Narrative ended';
    case Malfunction      = 'Malfunction';
    case TerrainDestroyed = 'Terrain destroyed';
    case DecorDestroyed   = 'Decor destroyed';
    case HostDestroyed    = 'Host Destroyed';
}
