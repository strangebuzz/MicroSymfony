<?php

declare(strict_types=1);

namespace App\Tests\Functional\Controller;

use App\Controller\ComposerAction;
use App\Controller\HomeAction;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * This test shows how to use a PHPUnit data provider.
 */
#[CoversClass(HomeAction::class)]
#[CoversClass(ComposerAction::class)]
final class StaticActionTest extends WebTestCase
{
    /**
     * @return iterable<array{0: string}>
     */
    public static function provide(): iterable
    {
        yield ['/'];
        yield ['/composer'];
    }

    #[DataProvider('provide')]
    public function testStaticAction(string $page): void
    {
        $client = self::createClient();
        $client->request('GET', $page);
        self::assertResponseIsSuccessful("Page $page is not successfull.");
    }
}
