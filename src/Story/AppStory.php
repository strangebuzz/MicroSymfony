<?php

declare(strict_types=1);

namespace App\Story;

use App\Factory\UserFactory;
use Zenstruck\Foundry\Attribute\AsFixture;
use Zenstruck\Foundry\Story;

/**
 * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#stories
 */
#[AsFixture(name: 'main')]
final class AppStory extends Story
{
    #[\Override]
    public function build(): void
    {
        UserFactory::createMany(10);
    }
}
