<?php

declare(strict_types=1);

namespace App\Twig\Extension;

use Symfony\Component\HttpFoundation\Response;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

final class ResponseExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('status_text', $this->getStatusText(...)),
        ];
    }

    public function getStatusText(int $errorCode): string
    {
        return Response::$statusTexts[$errorCode] ?? 'Unknown error code';
    }
}
