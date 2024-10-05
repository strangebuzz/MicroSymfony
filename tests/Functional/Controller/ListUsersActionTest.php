<?php

declare(strict_types=1);

namespace App\Tests\Functional\Controller;

use App\Story\AppStory;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Test\ResetDatabase;

/**
 * @see ListUsersAction
 */
final class ListUsersActionTest extends WebTestCase
{
    use Factories;
    use ResetDatabase;

    public function testListUserActionSuccess(): void
    {
        $client = self::createClient();
        AppStory::load();
        $client->request('GET', '/users');
        self::assertResponseIsSuccessful();
    }
}
