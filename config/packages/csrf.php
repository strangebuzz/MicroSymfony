<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Kernel;

return static function (ContainerConfigurator $containerConfigurator): void {
    // This configuration file is specific to Symfony 7.2 and above.
    // So we don't need to load it when using Symfony 6.4 LTS for example.
    if (Kernel::VERSION_ID < 70200) {
        return;
    }

    // Enable stateless CSRF protection for forms and logins/logouts
    $containerConfigurator->extension('framework', [
        'form' => [
            'csrf_protection' => [
                'token_id' => 'submit',
            ],
        ],
        'csrf_protection' => [
            'stateless_token_ids' => [
                'submit',
                'authenticate',
                'logout',
            ],
        ],
    ]);
};
