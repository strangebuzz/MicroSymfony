<?php

declare(strict_types=1);

use App\Kernel;
use Symfony\Component\Dotenv\Dotenv;

require_once __DIR__.'/vendor/autoload_runtime.php';

(new Dotenv())->bootEnv(__DIR__.'/.env');

$kernel = new Kernel($_ENV['APP_ENV'], (bool) $_ENV['APP_DEBUG']);
$kernel->boot();

return $kernel->getContainer()->get('twig');
