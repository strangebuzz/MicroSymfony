<?php

declare(strict_types=1);

/**
 * Returns the importmap for this application.
 *
 * - "path" is a path inside the asset mapper system. Use the
 *     "debug:asset-map" command to see the full list of paths.
 *
 * - "entrypoint" (JavaScript only) set to true for any module that will
 *     be used as an "entrypoint" (and passed to the importmap() Twig function).
 *
 * The "importmap:require" command can be used to add new entries to this file.
 */
return [
    'app' => [
        'path' => 'app.js',
        'entrypoint' => true,
    ],
    '@hotwired/stimulus' => [
        'version' => '3.2.2',
    ],
    '@symfony/stimulus-bundle' => [
        'path' => '@symfony/stimulus-bundle/loader.js',
    ],
    '@hotwired/turbo' => [
        'version' => '7.3.0',
    ],
    '@picocss/pico' => [
        'version' => '2.0.6',
    ],
    '@picocss/pico/css/pico.min.css' => [
        'version' => '2.0.6',
        'type' => 'css',
    ],
];
