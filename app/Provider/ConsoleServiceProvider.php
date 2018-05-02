<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017/11/27
 * Time: 下午11:53
 */

namespace App\Provider;

use App\Listener\AppListener;
use Mco\Console\App;
use Toolkit\Collection\Configuration;
use Toolkit\DI\Container;
use Toolkit\DI\ServiceProviderInterface;

/**
 * Class ConsoleServiceProvider
 * @package App\Providers
 */
class ConsoleServiceProvider implements ServiceProviderInterface
{
    /**
     * 注册一项服务(可能含有多个服务)提供者到容器中
     * @param Container $di
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     * @throws \RangeException
     */
    public function register(Container $di)
    {
    }
}
