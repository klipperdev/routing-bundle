<?php

/*
 * This file is part of the Klipper package.
 *
 * (c) François Pluchino <francois.pluchino@klipper.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Klipper\Bundle\RoutingBundle\Routing;

use Klipper\Component\Routing\Router as KlipperRouter;
use Symfony\Bundle\FrameworkBundle\Routing\Router as BaseRouter;
use Symfony\Component\HttpKernel\CacheWarmer\WarmableInterface;
use Symfony\Contracts\Service\ServiceSubscriberInterface;

/**
 * @author François Pluchino <francois.pluchino@klipper.dev>
 */
class Router extends KlipperRouter implements WarmableInterface, ServiceSubscriberInterface
{
    /**
     * @var BaseRouter
     */
    protected $router;

    /**
     * Constructor.
     *
     * @param BaseRouter $router The router
     */
    public function __construct(BaseRouter $router)
    {
        parent::__construct($router);
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedServices(): array
    {
        return BaseRouter::getSubscribedServices();
    }

    /**
     * {@inheritdoc}
     */
    public function warmUp($cacheDir): void
    {
        $this->router->warmUp($cacheDir);
    }
}
