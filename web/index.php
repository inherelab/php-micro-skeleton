<?php
/**
 * @var \Mco\Web\App $app
 * @var Inhere\Library\DI\Container $di
 */

define('RUN_MODE', 'web');
defined('IN_SWOOLE') || define('IN_SWOOLE', false);

include dirname(__DIR__) . '/conf/defined.php';
require dirname(__DIR__) . '/vendor/autoload.php';

$di = new \Inhere\Library\DI\Container();

// boot
$app = \App\Bootstrap::boot($di);

// in the unit testing.
if (IN_CODE_TESTING) {
    return $app;
}

$app->use(function ($req, $h) {
    echo "ddd\n";
    $res = $h->handle($req);
    echo "ddd-fff\n";

    return $res;
});

$app->run();
