<?php

namespace App\Enum;

trait EnumTrait
{
    public static function choices(): array
    {
        return array_column(self::cases(), 'name', 'value');
    }
}
