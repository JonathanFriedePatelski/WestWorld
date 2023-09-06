<?php

namespace App\Enums;

/**
 *  This trait provides a reusable method for returning a backed enum's values
 *  as an associative array
 */
trait EnumHasValues
{
    public static function values(): array
    {
        return array_column(self::cases(), 'value', 'name');
    }
}
