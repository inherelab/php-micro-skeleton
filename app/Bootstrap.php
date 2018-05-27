<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017/11/27
 * Time: 上午12:18
 */

namespace App;

use App\Listener\AppListener;
use App\Provider\CommonServiceProvider;
use App\Provider\ConsoleServiceProvider;
use App\Provider\WebServiceProvider;
use Inhere\Route\ORouter;
use Mco\Component\EnvDetector;
use Toolkit\PhpUtil\PhpDotEnv;
use Mco\Http\App as WebApp;
use Mco\Console\App as CliApp;

/**
 * Class Bootstrap
 * @package App
 */
class Bootstrap
{
    /**
     * @return \Mco\Http\App|\Mco\Console\App
     */
    public static function boot()
    {
        return (new self)
            ->prepareEnv()
            ->settingPhp()
            ->createApp();
    }

    protected function prepareEnv(): self
    {
        // init .env
        PhpDotEnv::load(BASE_PATH);

        // init env setting
        EnvDetector::setHost2env(HOST2ENV);
        EnvDetector::setDomain2env(DOMAIN2ENV);

        // define current is IN_CODE_TESTING.
        \defined('IN_CODE_TESTING') || \define('IN_CODE_TESTING', false);

        if (RUN_MODE === 'web') {
            // Detect environment: allow change env by HOSTNAME OR HTTP_HOST
            if (!$envName = env('APP_ENV')) {
                $envName = EnvDetector::getByHost() ?: EnvDetector::getByDomain(APP_PDT);
            }
        } else {
            // Detect environment: allow change env by HOSTNAME
            if (!$envName = env('APP_ENV')) {
                $envName = EnvDetector::getByHost(APP_PDT);
            }
        }

        // APP_ENV Current application environment
        \defined('APP_ENV') || \define('APP_ENV', $envName);

        return $this;
    }

    /**
     * settingPhp
     */
    public function settingPhp()
    {
        \date_default_timezone_set(env('TIME_ZONE', 'UTC'));

        // Set the MB extension encoding to the same character set
        if (\function_exists('mb_internal_encoding')) {
            \mb_internal_encoding('utf-8');
        }

        switch (APP_ENV) {
            case APP_DEV:
            case APP_TEST:
                \ini_set('display_errors', 1);
                \ini_set('display_startup_errors', 1);
                \error_reporting(\E_ALL);
                break;
            default:
                \ini_set('display_errors', 0);
                \ini_set('display_startup_errors', 0);
                \error_reporting(0);
                break;
        }

        if (PHP_SAPI === 'cli') {
            \ini_set('html_errors', 0);
        } else {
            \ini_set('html_errors', 1);
        }

        return $this;
    }

    /**
     * @return \Mco\Http\App|\Mco\Console\App
     * @throws \Toolkit\DI\Exception\DependencyResolutionException
     * @throws \InvalidArgumentException
     */
    protected function createApp()
    {
        // on runtime end.
        \register_shutdown_function(AppListener::class . '::endOfRun');

        if (RUN_MODE === 'web') {
            $app = new WebApp(require \dirname(__DIR__) . '/conf/web.php');
            $this->loadWebRoutes($app->get('router'));
        } else {
            $app = new CliApp(require \dirname(__DIR__) . '/conf/console.php');
        }

        $em = $app->get('eventManager');
        $em->attach('app', new AppListener());

        return $app;
    }

    /**
     * @param ORouter $router
     */
    private function loadWebRoutes(ORouter $router)
    {
        include BASE_PATH . '/app/Http/routes.php';
    }
}
