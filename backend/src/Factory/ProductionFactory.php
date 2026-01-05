<?php

namespace App\Factory;

use App\Entity\Production;
use App\Enum\ProductionStatusEnum;
use Zenstruck\Foundry\Persistence\PersistentObjectFactory;

final class ProductionFactory extends PersistentObjectFactory
{
    public static function class(): string
    {
        return Production::class;
    }

    protected function defaults(): array|callable
    {
        return [
            'name' => self::faker()->text(100),
            'description' => self::faker()->text(5000),
            'status' => self::faker()->randomElement(ProductionStatusEnum::choices()),
        ];
    }
}
