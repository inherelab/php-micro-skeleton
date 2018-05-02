<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017/11/27
 * Time: 下午11:51
 */

namespace App\Provider;

use Toolkit\DI\Container;
use Toolkit\DI\ServiceProviderInterface;
use Inhere\Route\ORouter;

/**
 * Class WebServiceProvider
 * @package App\Providers
 */
class WebServiceProvider implements ServiceProviderInterface
{
    /**
     * 注册一项服务(可能含有多个服务)提供者到容器中
     * @param Container $di
     * @throws \Toolkit\DI\Exception\DependencyResolutionException
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     * @throws \RangeException
     */
    public function register(Container $di)
    {
        //$this->loadWebRoutes($di->get('router'));

        // ...
    }
}
