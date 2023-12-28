<?php

declare(strict_types=1);

namespace App\Tests\Integration\Twig\Extension;

use App\Twig\Extension\MarkdownExtension;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

final class MarkdownExtensionTest extends KernelTestCase
{
    public function testResponseExtension(): void
    {
        self::bootKernel();
        $extension = self::getContainer()->get(MarkdownExtension::class);
        self::assertNotEmpty($extension->getFilters());
    }
}
