<?php

namespace App\Enum;

enum AssetStatusEnum: string
{
    use EnumTrait;

    case UPLOADED = 'uploaded';
    case PROCESSING = 'processing';
    case READY = 'ready';
    case ARCHIVED = 'archived';
}
