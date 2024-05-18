<?php

// @see https://github.com/symfony/symfony/blob/7.1/.php-cs-fixer.dist.php

declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->exclude('var')
;

return (new PhpCsFixer\Config())
    ->setRules([
        // taken from the Symfony config     // https://github.com/symfony/symfony/blob/7.1/.php-cs-fixer.dist.php
        '@Symfony' => true,                  // https://cs.symfony.com/doc/ruleSets/Symfony.html
        '@Symfony:risky' => true,            // https://cs.symfony.com/doc/ruleSets/SymfonyRisky.html
        'protected_to_private' => false,     // https://cs.symfony.com/doc/rules/class_notation/protected_to_private.html
        'nullable_type_declaration' => true, // https://cs.symfony.com/doc/rules/language_construct/nullable_type_declaration.html
        'trailing_comma_in_multiline' => [   // https://cs.symfony.com/doc/rules/control_structure/trailing_comma_in_multiline.html
            'elements' => [
                'arrays',
                'match',
                'parameters',
            ],
        ],
        // additional ones
        'phpdoc_to_comment' => false,        // https://cs.symfony.com/doc/rules/phpdoc/phpdoc_to_comment.html Needed to avoid messing with @var annotations for PHPStan
        'yoda_style' => false,               // https://cs.symfony.com/doc/rules/control_structure/yoda_style.html
        'declare_strict_types' => true,      // https://cs.symfony.com/doc/rules/strict/declare_strict_types.html
    ])
    ->setRiskyAllowed(true)
    ->setFinder($finder)
    ->setCacheFile('.php-cs-fixer.cache')
;
