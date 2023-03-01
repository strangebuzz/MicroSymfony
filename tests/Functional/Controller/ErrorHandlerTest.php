<?php

declare(strict_types=1);

namespace App\Tests\Functional\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

final class ErrorHandlerTest extends WebTestCase
{
    public function test404(): void
    {
        $client = self::createClient();
        $client->request('GET', '/404');
        self::assertResponseStatusCodeSame(Response::HTTP_NOT_FOUND);
    }
}
