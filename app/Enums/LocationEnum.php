<?php

namespace App\Enums;

class LocationEnum
{
    // Type Enums
    public const FACILITY = 'facility';
    public const TOWN = 'town';
    public const REGION = 'region';
    public const LANDMARK = 'landmark';

    // Narrative Level Enums
    public const NONE = 'none';
    public const PEACEFUL = 'peaceful';
    public const VIOLENT = 'violent';
    public const NEUTRAL = 'neutral';

    /**
     * @return array
     */
    public static function types(): array
    {
        return [
            self::FACILITY,
            self::TOWN,
            self::REGION,
            self::LANDMARK,
        ];
    }

    /**
     * @return array
     */
    public static function narrativeLevels(): array
    {
        return [
            self::NONE,
            self::PEACEFUL,
            self::VIOLENT,
            self::NEUTRAL,
        ];
    }
}
