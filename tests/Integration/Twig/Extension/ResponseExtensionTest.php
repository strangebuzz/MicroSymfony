<?php

declare(strict_types=1);

namespace App\Tests\Integration\Twig\Extension;

use App\Twig\Extension\ResponseExtension;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\HttpFoundation\Response;

final class ResponseExtensionTest extends KernelTestCase
{
    public function testResponseExtension(): void
    {
        self::bootKernel();
        $extension = self::getContainer()->get(ResponseExtension::class);
        self::assertNotEmpty($extension->getFilters());
        self::assertSame('Not Found', $extension->getStatusText(Response::HTTP_NOT_FOUND));
    }
}
