<?php

declare(strict_types=1);

namespace App\Tests\Functional\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * This file tests static pages without associated controller.
 *
 * @see config/routes.yaml
 */
final class StaticControllerTest extends WebTestCase
{
    public function testStimulus(): void
    {
        $client = self::createClient();
        $client->request('GET', '/stimulus');
        self::assertResponseIsSuccessful();
    }
}
