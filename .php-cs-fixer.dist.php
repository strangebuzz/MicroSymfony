<?php

declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->exclude('var')
;

return (new PhpCsFixer\Config())->setRules([
    '@Symfony' => true,             // https://cs.symfony.com/doc/ruleSets/Symfony.html
    'declare_strict_types' => true, // https://cs.symfony.com/doc/rules/strict/declare_strict_types.html
])->setFinder($finder);
