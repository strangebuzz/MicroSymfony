<?php

declare(strict_types=1);

namespace App\Tests\Functional\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\ErrorHandler\ErrorHandler;
use Symfony\Component\HttpFoundation\Response;

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
     * @see ErrorHandler::handleException
     */
    public function test404(): void
    {
        $client = self::createClient();
        $client->request('GET', '/404');
        self::assertResponseStatusCodeSame(Response::HTTP_NOT_FOUND);
    }
}
