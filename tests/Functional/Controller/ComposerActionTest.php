<?php

declare(strict_types=1);

namespace App\Tests\Functional\Controller;

use App\Controller\ComposerAction;
use PHPUnit\Framework\Attributes\CoversClass;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

#[CoversClass(ComposerAction::class)]
final class ComposerActionTest extends WebTestCase
{
    /**
     * This test is kept for the example, but this page is already tested by StaticRoutesSmokeTest.
     *
     * @see StaticRoutesSmokeTest
     */
    public function testComposerPage(): void
    {
        $client = self::createClient();
        $client->request('GET', '/composer');
        self::assertResponseIsSuccessful();
    }
}
