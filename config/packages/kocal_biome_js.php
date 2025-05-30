<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    if ($containerConfigurator->env() === 'dev') {
        $containerConfigurator->extension('kocal_biome_js', [
            // Biome.js CLI version to use:
            // - "latest_stable": use the latest stable version
            // - "latest_nightly": use the latest nightly version
            // - or a specific version, e.g. "v1.8.3", find available tags at https://github.com/biomejs/biome/tags
            'binary_version' => 'latest_stable',
        ]);
    }
};
