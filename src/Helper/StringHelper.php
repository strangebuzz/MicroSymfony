<?php

declare(strict_types=1);

namespace App\Helper;

use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * This is a simple service just to create a unit test example.
 *
 * @see StringHelperTest
 */
final readonly class StringHelper
{
    public function __construct(
        private SluggerInterface $slugger,
    ) {
    }

    public function slugify(?string $string): string
    {
        return $this->slugger->slug((string) $string)->lower()->toString();
    }
}
