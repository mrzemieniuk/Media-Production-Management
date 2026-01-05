<?php

namespace App\Story;

use App\Factory\AssetFactory;
use App\Factory\ProductionFactory;
use App\Factory\ProductionMemberFactory;
use App\Factory\UserFactory;
use Zenstruck\Foundry\Attribute\AsFixture;
use Zenstruck\Foundry\Story;

#[AsFixture(name: 'main')]
final class AppStory extends Story
{
    public function build(): void
    {
        UserFactory::createOne(['email' => 'admin@mail.com', 'roles' => ['ROLE_ADMIN']]);
        ProductionFactory::createMany(10);
        ProductionMemberFactory::createMany(40);
        AssetFactory::createMany(100);
    }
}
