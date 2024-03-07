<?php

declare(strict_types=1);

namespace App\Tests\Functional\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class HelloWorldTest extends WebTestCase
{
    public function testHelloWorld(): void
    {
        $client = self::createClient();
        $client->request('GET', '/hello-world');
        self::assertResponseIsSuccessful();
    }
}
