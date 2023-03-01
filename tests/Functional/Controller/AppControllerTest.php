<?php

declare(strict_types=1);

namespace App\Tests\Functional\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class AppControllerTest extends WebTestCase
{
    /**
     * @see AppController::home()
     */
    public function testRoot(): void
    {
        $client = self::createClient();
        $client->request('GET', '/');
        self::assertResponseIsSuccessful();
        self::assertRouteSame('app_home');
    }

    /**
     * @see AppController::readme()
     */
    public function testReadme(): void
    {
        $client = self::createClient();
        $client->request('GET', '/readme');
        self::assertResponseIsSuccessful();
    }

    /**
     * @see AppController::composer()
     */
    public function testComposer(): void
    {
        $client = self::createClient();
        $client->request('GET', '/composer');
        self::assertResponseIsSuccessful();
    }
}
