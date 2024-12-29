<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Config\FrameworkConfig; // @see var/cache/dev/Symfony/Config/FrameworkConfig.php

return static function (ContainerConfigurator $containerConfigurator, FrameworkConfig $frameworkConfig): void {
    $frameworkConfig->secret('%env(APP_SECRET)%');

    // see https://symfony.com/doc/current/reference/configuration/framework.html
    $containerConfigurator->extension('framework', [
        // 'secret' => '%env(APP_SECRET)%', // set at line 9 with the fluent interface.
        // 'csrf_protection' => true,
        'http_method_override' => false,
        'handle_all_throwables' => true,

        // Enables session support. Note that the session will ONLY be started if you read or write from it.
        // Remove or comment this section to explicitly disable session support.
        'session' => [
            'handler_id' => null,
            'cookie_secure' => 'auto',
            'cookie_samesite' => 'lax',
            'storage_factory_id' => 'session.storage.factory.native',
        ],

        // 'esi' => true
        // 'fragments' => true
        'php_errors' => [
            'log' => true,
        ],
    ]);

    if ($containerConfigurator->env() === 'test') {
        $containerConfigurator->extension('framework', [
            'test' => true,
            'session' => [
                'storage_factory_id' => 'session.storage.factory.mock_file',
            ],
        ]);
    }
};
