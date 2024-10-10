<?php

declare(strict_types=1);

namespace App\Tests\Functional\Controller;

use PHPUnit\Framework\Attributes\DataProvider;
use Symfony\Bundle\FrameworkBundle\Test\TestContainer;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Routing\RouterInterface;

/**
 * Extracted and simplified from the "pierstoval/smoke-testing" package.
 *
 * @see https://github.com/Pierstoval/SmokeTesting
 */
final class StaticRoutesSmokeTest extends WebTestCase
{
    #[DataProvider('provideRouteCollection')]
    public function testRoutesDoNotReturnInternalError(string $httpMethod, string $routeName, string $routePath): void
    {
        $client = self::createClient();

        $client->request($httpMethod, $routePath);

        $response = $client->getResponse();
        self::assertLessThan(
            500,
            $response->getStatusCode(),
            \sprintf('Request "%s %s" for route "%s" returned an internal error.', $httpMethod, $routePath, $routeName),
        );
    }

    /**
     * @return \Generator<string, array{httpMethod: string, routeName: string, routePath: string}>
     */
    public static function provideRouteCollection(): \Generator
    {
        if (!is_a(self::class, WebTestCase::class, true)) {
            throw new \RuntimeException(\sprintf('The "%s" trait trait can only be used in an instance of "%s"', self::class, WebTestCase::class));
        }

        self::bootKernel();

        /** @var TestContainer $container */
        $container = self::getContainer();

        /** @var RouterInterface $router */
        $router = $container->get(RouterInterface::class);

        $routes = $router->getRouteCollection();

        self::ensureKernelShutdown();

        if (!$routes->count()) {
            throw new \RuntimeException('No routes found in the application.');
        }

        yield from self::extractRoutesFromRouter($router);
    }

    /**
     * @return \Generator<string, array{httpMethod: string, routeName: string, routePath: string}>
     */
    public static function extractRoutesFromRouter(RouterInterface $router): \Generator
    {
        foreach ($router->getRouteCollection() as $routeName => $route) {
            $compiledRoute = $route->compile();
            $variables = $compiledRoute->getVariables();
            if (\count($variables) > 0) {
                $defaults = $route->getDefaults();
                $defaultsKeys = array_keys($defaults);
                $diff = array_diff($variables, $defaultsKeys);
                if (\count($diff) > 0) {
                    // Dynamic route with no defaults, won't handle it
                    continue;
                }
            }

            $methods = $route->getMethods();
            if (!$methods) {
                @trigger_error(\sprintf('Route %s has no configured HTTP methods. It is recommended that you set at least one HTTP method for your route in its configuration.', $routeName), \E_USER_DEPRECATED);

                $methods[] = 'GET';
            }

            foreach ($methods as $method) {
                $routePath = $router->generate($routeName);
                yield "$method {$routePath}" => ['httpMethod' => $method, 'routeName' => $routeName, 'routePath' => $routePath];
            }
        }
    }
}
