<?php

namespace App\Enums;

class HoverCraftEnum
{
    public const FACTORY_NEW = 'Factory New';
    public const MINIMAL_WEAR = 'Minimal Wear';
    public const FIELD_TESTED = 'Field-Tested';
    public const WELL_WORN = 'Well-Worn';
    public const BATTLE_SCARRED = 'Battle-Scarred';

    /**
     * @return array
    */
    public static function levels(): array
    {
        return [
            self::FACTORY_NEW,
            self::MINIMAL_WEAR,
            self::FIELD_TESTED,
            self::WELL_WORN,
            self::BATTLE_SCARRED,
        ];
    }
}
