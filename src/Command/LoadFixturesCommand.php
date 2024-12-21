<?php

declare(strict_types=1);

namespace App\Command;

use Doctrine\DBAL\Connection;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\String\ByteString;

/**
 * Simple command because we don't want to use a heavy fixture bundle in MicroSymfony.
 * If you have more complex fixtures to load, then use a dedicated bundle like Foundry
 * Alice or the Doctrine one, links below.
 *
 * @see https://github.com/theofidry/AliceBundle
 * @see https://symfony.com/bundles/DoctrineFixturesBundle/current/index.html
 * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html
 */
#[AsCommand(
    name: 'app:load-fixtures',
    description: 'Simple command to load some fixtures in the database (without a fixtures bundle).',
)]
final class LoadFixturesCommand extends Command
{
    public function __construct(private readonly Connection $connection)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        for ($i = 1; $i <= 10; ++$i) {
            $this->connection->insert('user', [
                'email' => \sprintf('user%d@example.com', $i),
                'password' => password_hash(ByteString::fromRandom(32)->toString(), \PASSWORD_DEFAULT),
                'pseudo' => ucfirst(ByteString::fromRandom(6, implode('', range('a', 'z')))->toString()),
                'created_at' => time(),
                'updated_at' => time(),
            ]);
        }

        $io->success('Done!');

        return Command::SUCCESS;
    }
}
