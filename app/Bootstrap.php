<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017/11/27
 * Time: 上午12:18
 */

namespace App;

use App\Listeners\AppListener;
use App\Providers\CommonServiceProvider;
use App\Providers\ConsoleServiceProvider;
use App\Providers\WebServiceProvider;
use Inhere\Library\Components\EnvDetector;
use \Inhere\Library\DI\Container;
use Inhere\Library\Components\PhpDotEnv;
use Mco\Web\App as WebApp;
use Mco\Console\App as CliApp;

/**
 * Class Bootstrap
 * @package App
 */
class Bootstrap
{
    public static function boot(Container $di)
    {
        \Mco::$di = $di;

        return (new self)->run($di);
    }

    protected function run(Container $di)
    {
        // init .env
        PhpDotEnv::load(BASE_PATH);
        // init env setting
        EnvDetector::setHost2env(HOST2ENV);
        EnvDetector::setDomain2env(DOMAIN2ENV);

        // define current is IN_CODE_TESTING.
        \defined('IN_CODE_TESTING') || \define('IN_CODE_TESTING', false);

        date_default_timezone_set(env('TIMEZONE', 'UTC'));

        // Read common services
        $di->registerServiceProvider(new CommonServiceProvider());

        if (RUN_MODE === 'web') {
            $app = $this->loadWebServices($di);
        } else {
            $app = $this->loadCliServices($di);
        }

        // load services from config
        $di->sets($di['config']->remove('services'));

        $this->init($di);

        return $app;
    }

    public function init(Container $di)
    {
        // error report level
//        error_reporting($config->get('phpErrorReport', E_ERROR));
        // date timezone
//        date_default_timezone_set($config->get('timezone', 'UTC'));

        // Set the MB extension encoding to the same character set
        if (\function_exists('mb_internal_encoding')) {
            mb_internal_encoding('utf-8');
        }

        // on runtime end.
        register_shutdown_function(AppListener::class . '::onRuntimeEnd', $di);
    }

    public function loadWebServices(Container $di)
    {
        // Detect environment: allow change env by HOSTNAME OR HTTP_HOST
        if (!$envName = env('APP_ENV')) {
            $envName = EnvDetector::getEnvNameByHost() ?: EnvDetector::getEnvNameByDomain(APP_PDT);
        }

        // APP_ENV Current application environment
        \defined('APP_ENV') || \define('APP_ENV', $envName);

        // Some services for WEB
        $di->registerServiceProvider(new WebServiceProvider());

        $app = new WebApp($di);
        $em = $di->get('eventManager');
        $em->attach('app', new AppListener());
        // $app->setEventsManager($em);

        return $app;
    }

    public function loadCliServices(Container $di)
    {
        // Detect environment: allow change env by HOSTNAME
        if (!$envName = env('APP_ENV')) {
            $envName = EnvDetector::getEnvNameByHost(APP_PDT);
        }

        // APP_ENV Current application environment
        \defined('APP_ENV') || \define('APP_ENV', $envName);

        // some services for CLI
        $di->registerServiceProvider(new ConsoleServiceProvider());
        $app = new CliApp($di);

        // save to DI
        $di->set('app', $app);

        $em = $di->get('eventManager');
        $em->attach('app', new AppListener());

        // $app->setEventManager($em);

        return $app;
    }
}
