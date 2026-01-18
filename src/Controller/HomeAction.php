<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\Cache;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

/**
 * @see StaticRoutesSmokeTest
 */
// using the AsController attribute is not mandatory when extending the Symfony
// AbstractController or when using the #Route attribute.
#[Cache(maxage: 3600, public: true)]
final class HomeAction extends AbstractController
{
    public function __construct(
        private readonly Filesystem $fs,
        private readonly CacheInterface $cache,
    ) {
    }

    /**
     * Displays the README.md file.
     */
    #[Route(path: '/', name: self::class)]
    public function __invoke(): Response
    {
        $readme = $this->cache->get('readme', function (ItemInterface $item) {
            $item->expiresAfter(3600);

            return $this->fs->readFile(__DIR__.'/../../README.md');
        });

        return $this->render(self::class.'.html.twig', ['readme' => $readme]);
    }
}
