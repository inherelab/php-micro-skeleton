<?php
/**
 *
 * @var \Mco\Web\App $app
 */

use Inhere\Library\DI\Container;

define('RUN_MODE', 'web');

include dirname(__DIR__) . '/config/defined.php';
require dirname(__DIR__) . '/vendor/autoload.php';

defined('IN_SWOOLE') || define('IN_SWOOLE', false);

/** @var Container $di */
$di = new \Inhere\Library\DI\Container();

// boot
$app = \App\Bootstrap::boot($di);

// in the unit testing.
if (IN_CODE_TESTING) {
    return $app;
}

$app->run();
