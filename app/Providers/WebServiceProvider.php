<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017/11/27
 * Time: 下午11:51
 */

namespace App\Providers;

use Inhere\Library\Collections\Configuration;
use Inhere\Library\DI\Container;
use Inhere\Library\DI\ServiceProviderInterface;

/**
 * Class WebServiceProvider
 * @package App\Providers
 */
class WebServiceProvider implements ServiceProviderInterface
{
    /**
     * 注册一项服务(可能含有多个服务)提供者到容器中
     * @param Container $di
     * @throws \RuntimeException
     * @throws \RangeException
     */
    public function register(Container $di)
    {
        /** @var Configuration $config */
        $config = $di->get('config');

        $config->load(include BASE_PATH . '/conf/web.php');

        // current env config file. e.g '/config/web/dev.php'
        $envFile = get_path('conf/web/' . APP_ENV. '.php');

        if (is_readable($envFile)) {
            $config->load(include $envFile);
        }

        // ...
    }
}
