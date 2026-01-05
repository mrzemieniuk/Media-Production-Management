<?php

namespace App\Factory;

use App\Entity\Asset;
use App\Enum\AssetStatusEnum;
use App\Enum\AssetTypeEnum;
use Zenstruck\Foundry\Persistence\PersistentObjectFactory;

final class AssetFactory extends PersistentObjectFactory
{
    public static function class(): string
    {
        return Asset::class;
    }

    protected function defaults(): array|callable
    {
        return [
            'filename' => self::faker()->text(255),
            'production' => ProductionFactory::new(),
            'status' => self::faker()->randomElement(AssetStatusEnum::choices()),
            'type' => self::faker()->randomElement(AssetTypeEnum::choices()),
        ];
    }
}
