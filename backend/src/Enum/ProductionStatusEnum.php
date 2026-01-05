<?php

namespace App\Enum;

enum ProductionStatusEnum: string
{
    use EnumTrait;

    case PLANNING = 'planning';
    case PRODUCTION = 'production';
    case POST_PRODUCTION = 'post production';
    case FINISHED = 'finished';
}
