<?php

namespace App\Enum;

enum AssetTypeEnum: string
{
    use EnumTrait;

    case VIDEO = 'video';
    case IMAGE = 'image';
    case AUDIO = 'audio';
}
