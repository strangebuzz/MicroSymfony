<?php

declare(strict_types=1);

namespace App\Controller;

use App\Helper\StringHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\Routing\Attribute\Route;

/**
 * This is an action implementing the ADR pattern.
 *
 * @see SlugifyActionTest
 * @see https://symfony.com/doc/current/controller/service.html#invokable-controllers
 */
final class SlugifyAction extends AbstractController
{
    /**
     * Simple API endpoint returning JSON. For a more serious API, please use API Platform 🕸.
     * We can use the MapQueryParameter attribute to inject GET parameters.
     *
     * @see https://api-platform.com/
     */
    #[Route(path: '/api/slugify', name: self::class)]
    public function __invoke(StringHelper $stringHelper, #[MapQueryParameter] string $title): Response
    {
        return $this->json(['slug' => $stringHelper->slugify($title)]);
    }
}
