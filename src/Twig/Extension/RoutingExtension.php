<?php

declare(strict_types=1);

namespace App\Twig\Extension;

use Symfony\Component\Routing\RouterInterface;
use Twig\Attribute\AsTwigFunction;

use function Symfony\Component\String\u;

/**
 * Routing related stuff.
 *
 * @see RoutingExtensionTest
 */
final class RoutingExtension
{
    /**
     * @var array<int, string>|null
     */
    private ?array $controllers = null;

    public function __construct(
        private readonly RouterInterface $router,
    ) {
    }

    /**
     * This function returns a complete controller FQCN from a short name.
     * If you have multiple controllers/actions with the same name, you can include
     * the parent namespace to select the good one like the last examples below.
     *
     * @example ComposerAction      --> App\Controller\ComposerAction
     * @example Product\ListAction  --> App\Controller\Product\ListAction
     * @example Category\ListAction --> App\Controller\Category\ListAction
     *
     * @return class-string
     */
    #[AsTwigFunction('ctrl_fqcn')]
    public function getControllerFqcn(string $ctrlShortname): string
    {
        if ($this->controllers === null) {
            $this->controllers = array_unique(array_map(
                static fn ($value) => u($value)->trimSuffix('::__invoke')->toString(),
                array_keys($this->router->getRouteCollection()->getAliases())
            ));
        }

        foreach ($this->controllers as $controller) {
            /** @var class-string $controller */
            if (u($controller)->endsWith($ctrlShortname)) {
                return $controller;
            }
        }

        // If all your ADR controllers live in the "App\Controller\" namespace,
        // then you probably don't need all the code above, just use:
        //
        // return  'App\\Controller\\'. $ctrlShortname;
        //
        // If the route is not found, then Twig raises a "RouteNotFoundException".

        throw new \InvalidArgumentException('No controller found for the "'.$ctrlShortname.'" shortname.');
    }

    /**
     * Returns an HTML attribute with a given value only if a condition is met.
     *
     * @see templates/base.html.twig
     */
    #[AsTwigFunction('attr_if')]
    public function getAttributeIf(bool $condition, string $attribute, string $value): string
    {
        if (!$condition) {
            return '';
        }

        return \sprintf(' %s="%s"', $attribute, $value);
    }

    #[AsTwigFunction('aria_current_page_if')]
    public function getAriaCurrentPageIf(bool $condition): string
    {
        return $this->getAttributeIf($condition, 'aria-current', 'page');
    }
}
