<?php

declare(strict_types=1);

namespace App\Twig\Extension;

use Symfony\Component\HttpKernel\Kernel;
use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;

/**
 * Env related stuff.
 */
final class EnvExtension extends AbstractExtension implements GlobalsInterface
{
    /**
     * @return array<string,string>
     */
    public function getGlobals(): array
    {
        return [
            'sf_version' => Kernel::VERSION,
            'php_version' => \PHP_VERSION,
            'php_sapi' => \PHP_SAPI,
        ];
    }
}
