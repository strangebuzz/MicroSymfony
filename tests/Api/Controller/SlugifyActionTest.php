<?php

declare(strict_types=1);

namespace App\Tests\Api\Controller;

use App\Controller\SlugifyAcfion;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class SlugifyActionTest extends WebTestCase
{
    /**
     * You have advanced JSON assertions in API Platform.
     *
     * @see https://api-platform.com/docs/distribution/testing/#writing-functional-tests
     * @see SlugifyAcfion
     */
    public function testAction(): void
    {
        $client = self::createClient();
        $client->request('GET', '/api/slugify?title=This IS the _-! Micro SYMFONY  project');
        self::assertResponseIsSuccessful();
        self::isJson();
        self::assertJsonStringEqualsJsonString('{"slug":"this-is-the-micro-symfony-project"}', (string) $client->getResponse()->getContent());

        // With the ApiTestCase, these tests would look like
        // $this->assertJsonContains([
        //     'slug' => 'this-is-the-micro-symfony-project',
        // ]);
    }
}
