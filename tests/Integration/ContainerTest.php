<?php

declare(strict_types=1);

namespace App\Tests\Integration;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

/**
 * Test that applications services can boot.
 *
 * @author https://github.com/lyrixx/
 *
 * @see https://gist.github.com/lyrixx/0adb8fd414451596557871d2d9af5695#file-containertest-php
 */
final class ContainerTest extends KernelTestCase
{
    private const FILTER_LIST = [
        // some services can exist only in dev or prod (thus not in test env)
        // or some services are behind some features flags
        // or some services are static (thus they are not real service)
    ];

    public function testContainer(): void
    {
        self::bootKernel(['debug' => true]);
        $projectDir = self::getContainer()->getParameter('kernel.project_dir');
        $container = self::getContainer();

        $builder = new ContainerBuilder();
        $loader = new XmlFileLoader($builder, new FileLocator());
        $loader->load($container->getParameter('debug.container.dump'));

        $count = 0;
        foreach ($builder->getDefinitions() as $id => $service) {
            if ($this->isSkipped($id, $service, $builder, $projectDir)) {
                continue;
            }
            $container->get($id);
            ++$count;
        }

        $this->addToAssertionCount($count);
    }

    private function isSkipped(string $id, Definition $service, ContainerBuilder $builder, string $projectDir): bool
    {
        if (str_starts_with($id, '.instanceof.') || str_starts_with($id, '.abstract.') || str_starts_with($id, '.errored.')) {
            return true; // Symfony internal stuff
        }

        if ($service->isAbstract()) {
            return true; // Symfony internal stuff
        }

        $class = $service->getClass();
        if (!$class) {
            return true; // kernel, or alias, or abstract
        }

        if (\in_array($class, self::FILTER_LIST)) {
            return true;
        }

        $rc = $builder->getReflectionClass($class, false);
        if (!$rc) {
            return true;
        }

        $filename = $rc->getFileName();
        if (!str_starts_with((string) $filename, "{$projectDir}/src")) {
            return true; // service class not in tests/Integration
        }

        if ($rc->isAbstract()) {
            return true;
        }

        return false;
    }
}
