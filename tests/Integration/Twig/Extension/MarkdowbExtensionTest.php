<?php

declare(strict_types=1);

namespace App\Tests\Integration\Twig\Extension;

use App\Twig\Extension\MarkdownExtension;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

final class MarkdowbExtensionTest extends KernelTestCase
{
    public function testResponseExtension(): void
    {
        self::bootKernel();
        $extension = $this->getContainer()->get(MarkdownExtension::class);
        self::assertNotEmpty($extension->getFilters());
    }
}
