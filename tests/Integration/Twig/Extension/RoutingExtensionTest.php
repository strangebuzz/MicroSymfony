<?php

declare(strict_types=1);

namespace App\Tests\Integration\Twig\Extension;

use App\Twig\Extension\RoutingExtension;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

final class RoutingExtensionTest extends KernelTestCase
{
    public function testRoutingExtensionInvalidArgumentException(): void
    {
        self::bootKernel();
        $extension = self::getContainer()->get(RoutingExtension::class);
        self::assertNotEmpty($extension->getFunctions());
        $this->expectException(\InvalidArgumentException::class);
        $extension->getControllerFqcn('foo');
    }
}
