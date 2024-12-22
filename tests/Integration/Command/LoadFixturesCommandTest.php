<?php

declare(strict_types=1);

namespace App\Tests\Integration\Command;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Component\Filesystem\Filesystem;

/**
 * @see https://symfony.com/doc/current/console.html#testing-commands
 */
final class LoadFixturesCommandTest extends KernelTestCase
{
    public function testExecute(): void
    {
        $kernel = self::bootKernel();

        // reset db
        (new Filesystem())->remove(\dirname(__DIR__, 3).'/var/data.db');

        // load schema
        $command = (new Application($kernel))->find('doctrine:migrations:migrate');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            '--env' => 'dev',
            '--no-interaction' => true,
        ]);
        $commandTester->assertCommandIsSuccessful();

        // then load fixtures
        $command = (new Application($kernel))->find('app:load-fixtures');
        $commandTester = new CommandTester($command);
        $commandTester->execute([]);
        $commandTester->assertCommandIsSuccessful();
        $output = $commandTester->getDisplay();
        $this->assertStringContainsString('Done!', $output);
    }
}
