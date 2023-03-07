<?php

declare(strict_types=1);

namespace App\Tests\E2E\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase as E2ETestCase;

// use Symfony\Component\Panther\PantherTestCase as E2ETestCase;

/**
 * Panther is not installed by default. To install it run "composer req --dev symfony/panther".
 * Above, comment the first use and uncomment the second one. Same in the testStimulus()
 * function, uncomment the first line and comment the second one.
 *
 * @see https://github.com/symfony/panther
 */
final class AppControllerTest extends E2ETestCase
{
    /**
     * @see StaticControllerTest
     */
    public function testStimulus(): void
    {
        // $client = self::createPantherClient();
        $client = self::createClient();
        $client->request('GET', '/');
        self::assertSelectorTextContains('body', 'MicroSymfony');
    }
}
