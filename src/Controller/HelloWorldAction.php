<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\Cache;
use Symfony\Component\Routing\Attribute\Route;

/**
 * We use the two binds we have defined in config/services.php::49.
 */
#[Cache(maxage: 3600, public: true)]
final class HelloWorldAction extends AbstractController
{
    #[Route(path: '/hello-world', name: self::class)]
    public function __invoke(string $environment, bool $debug): Response
    {
        return $this->render(self::class.'.html.twig', [
            'environment' => $environment,
            'debug' => $debug,
        ]);
    }
}
