<?php

namespace App\Enum;

enum CrewPositionEnum: string
{
    use EnumTrait;

    case PRODUCER = 'producer';
    case DIRECTOR = 'director';
    case CAMERA_OPERATOR = 'camera operator';
    case EDITOR = 'editor';
}
