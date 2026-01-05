<?php

namespace App\Factory;

use App\Entity\ProductionMember;
use App\Enum\CrewPositionEnum;
use Zenstruck\Foundry\Persistence\PersistentObjectFactory;

final class ProductionMemberFactory extends PersistentObjectFactory
{
    public static function class(): string
    {
        return ProductionMember::class;
    }

    protected function defaults(): array|callable
    {
        return [
            'person' => UserFactory::new(),
            'production' => ProductionFactory::new(),
            'crewPosition' => self::faker()->randomElement(CrewPositionEnum::choices())
        ];
    }
}
