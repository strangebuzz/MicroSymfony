<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    if ($containerConfigurator->env() === 'dev') {
        $containerConfigurator->extension('kocal_biome_js', [
            // The Biome.js CLI version to use, that you can find at https://github.com/biomejs/biome/tags:
            // - for >=2.0.0 versions, the git tag follows the pattern "@biomejs/biome@VERSION"
            // - for <2.0.0 versions, the git tag follows the pattern "cli/VERSION"
            'binary_version' => '2.0.0', // required
        ]);
    }
};
