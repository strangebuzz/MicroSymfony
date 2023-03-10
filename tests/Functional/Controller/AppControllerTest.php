<?php

declare(strict_types=1);

namespace App\Tests\Functional\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class AppControllerTest extends WebTestCase
{
    /**
     * @see AppController::home()
     * @see AppController::composer()
     *
     * @return iterable<array{0: string}>
     */
    public function provideTestSimplePage(): iterable
    {
        yield ['/'];
        yield ['/composer'];
    }

    /**
     * @dataProvider provideTestSimplePage
     */
    public function testSimplePage(string $page): void
    {
        $client = self::createClient();
        $client->request('GET', $page);
        self::assertResponseIsSuccessful("Page $page is not successfull.");
    }

    /**
     * @see AppController::form()
     */
    public function testForm(): void
    {
        $client = self::createClient();
        $crawler = $client->request('GET', '/form');
        self::assertResponseIsSuccessful();

        $form = $crawler->selectButton('form_save')->form();
        $client->submit($form, [
            $form->getName().'[name]' => 'COil',
            $form->getName().'[fruit]' => 'apple',
        ]);
        self::assertResponseIsSuccessful();
    }
}