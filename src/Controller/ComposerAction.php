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
 * @see ComposerActionTest
 */
#[Cache(maxage: 3600, public: true)]
final class ComposerAction extends AbstractController
{
    public function __construct(
        private readonly Filesystem $fs,
        private readonly CacheInterface $cache,
    ) {
    }

    /**
     * Displays the composer.json file.
     */
    #[Route(path: '/composer', name: self::class)]
    public function __invoke(): Response
    {
        $composer = $this->cache->get('composer', function (ItemInterface $item) {
            $item->expiresAfter(3600);

            return $this->fs->readFile(__DIR__.'/../../composer.json');
        });

        return $this->render(self::class.'.html.twig', ['composer' => $composer]);
    }
}
