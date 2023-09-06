<?php

namespace App\Enums;

class IncidentEnum
{
    public const HOST_DESTROYED = 'Host Destroyed';
    public const DECOR_DESTROYED = 'Decor destroyed';
    public const NARRATIVE_ENDED = 'Narrative ended';
    public const MALFUNCTION = 'Malfunction';
    public const TERRAIN_DESTROYED = 'Terrain destroyed';

    public const CRITICAL = 'Critical';
    public const HIGH = 'High';
    public const MEDIUM = 'Medium';
    public const LOW = 'Low';

    /**
     * @return array
     */
    public static function types(): array
    {
        return [
            self::HOST_DESTROYED,
            self::DECOR_DESTROYED,
            self::NARRATIVE_ENDED,
            self::MALFUNCTION,
            self::TERRAIN_DESTROYED,
        ];
    }

    /**
     * @return array
     */
    public static function severities(): array
    {
        return [
            self::CRITICAL,
            self::HIGH,
            self::MEDIUM,
            self::LOW,
        ];
    }
}
