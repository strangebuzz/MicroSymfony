<?php

declare(strict_types=1);

namespace App\Helper;

use Symfony\Component\String\Slugger\SluggerInterface;

use function Symfony\Component\String\u;

/**
 * This is a simple service just to create a unit test example.
 */
final class StringHelper
{
    public function __construct(
        private readonly SluggerInterface $slugger
    ) {
    }

    public function slugify(?string $string): string
    {
        return $this->slugger->slug(u($string)->lower()->toString())->toString();
    }
}
